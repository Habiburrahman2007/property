-- =============================================================
-- Prime Property - Database Schema
-- Engine   : InnoDB
-- Charset  : utf8mb4
-- Collation: utf8mb4_unicode_ci
-- Created  : 2026-05-25
-- =============================================================

-- Ensure we are working in the correct database context.
-- Replace `prime_property` with your actual database name if different.
-- CREATE DATABASE IF NOT EXISTS `prime_property`
--     CHARACTER SET utf8mb4
--     COLLATE utf8mb4_unicode_ci;
-- USE `prime_property`;

SET FOREIGN_KEY_CHECKS = 0;

-- =============================================================
-- TABLE: users
-- Purpose : Store admin and superadmin authentication data.
--           Supports soft-disable via `is_active` flag instead
--           of hard deletion, preserving referential integrity.
-- =============================================================
CREATE TABLE `users` (
    -- Primary identifier
    `id`         BIGINT UNSIGNED  NOT NULL AUTO_INCREMENT,

    -- Authentication credentials
    `email`      VARCHAR(255)     NOT NULL COMMENT 'Must be unique across all admin accounts',
    `password`   VARCHAR(255)     NOT NULL COMMENT 'Stores bcrypt-hashed password',

    -- Access control
    `role`       ENUM('admin', 'superadmin') NOT NULL COMMENT 'Defines permission level',
    `is_active`  BOOLEAN          NOT NULL DEFAULT TRUE COMMENT 'FALSE disables login without deleting the record',

    -- Audit timestamps
    `created_at` TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP
                                  ON UPDATE CURRENT_TIMESTAMP,

    -- Constraints
    PRIMARY KEY (`id`),
    UNIQUE KEY `uq_users_email` (`email`)

) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_unicode_ci
  COMMENT='Admin and superadmin authentication records';


-- =============================================================
-- TABLE: properties
-- Purpose : Store property listing data including physical
--           attributes, pricing, availability, and location.
--           Supports soft delete via `deleted_at`.
-- =============================================================
CREATE TABLE `properties` (
    -- Primary identifier
    `id`            BIGINT UNSIGNED     NOT NULL AUTO_INCREMENT,

    -- Basic information
    `nama_property` VARCHAR(100)        NOT NULL COMMENT 'Property display name; min 3, max 100 characters',
    `group_name`    VARCHAR(255)        NULL     COMMENT 'Optional grouping label (e.g., cluster or phase name)',

    -- Physical dimensions
    `lebar`         DECIMAL(5, 2)       NOT NULL COMMENT 'Width of the property in meters; must be > 0',
    `panjang`       DECIMAL(5, 2)       NOT NULL COMMENT 'Length of the property in meters; must be > 0',

    -- Orientation — SET allows multiple combined values (e.g., "Utara,Timur")
    `hadap`         SET('Utara', 'Selatan', 'Timur', 'Barat')
                                        NOT NULL COMMENT 'Facing direction(s) of the property',

    -- Classification
    `tipe`          ENUM('Ruko', 'Villa')
                                        NOT NULL COMMENT 'Property type',
    `tingkat`       DECIMAL(3, 1)       NOT NULL COMMENT 'Number of floors; range 1.0 – 10.0',

    -- Pricing (stored as integer to avoid floating-point rounding)
    `price`         BIGINT UNSIGNED     NOT NULL COMMENT 'Listing price in full currency unit (e.g., IDR)',

    -- Amenity flag
    `carport`       BOOLEAN             NOT NULL COMMENT 'TRUE if property includes a carport',

    -- Availability & readiness
    `status`        ENUM('in stock', 'sold_out')
                                        NOT NULL COMMENT 'Current market availability',
    `siap`          ENUM('siap_huni', 'siap_kosong', 'siap_huni_renovasi')
                                        NOT NULL COMMENT 'Move-in readiness state',

    -- Location
    `maps_link`     VARCHAR(255)        NULL     COMMENT 'Optional Google Maps or similar URL',
    `kawasan`       JSON                NOT NULL COMMENT 'Multi-tag area/region metadata stored as JSON array',

    -- Unit identifier (e.g., block/lot number)
    `unit`          VARCHAR(255)        NULL     COMMENT 'Optional unit or lot identifier',

    -- Ownership / audit trail
    `created_by`    BIGINT UNSIGNED     NOT NULL COMMENT 'FK → users(id); the admin who created this listing',

    -- Audit timestamps
    `created_at`    TIMESTAMP           NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at`    TIMESTAMP           NOT NULL DEFAULT CURRENT_TIMESTAMP
                                                 ON UPDATE CURRENT_TIMESTAMP,

    -- Soft delete timestamp (NULL means the record is active)
    `deleted_at`    TIMESTAMP           NULL     DEFAULT NULL
                                                 COMMENT 'Non-NULL value marks the record as soft-deleted',

    -- Constraints
    PRIMARY KEY (`id`),

    -- CHECK: nama_property must be between 3 and 100 characters
    CONSTRAINT `chk_properties_nama_length`
        CHECK (CHAR_LENGTH(`nama_property`) BETWEEN 3 AND 100),

    -- CHECK: lebar must be a positive value
    CONSTRAINT `chk_properties_lebar_positive`
        CHECK (`lebar` > 0),

    -- CHECK: panjang must be a positive value
    CONSTRAINT `chk_properties_panjang_positive`
        CHECK (`panjang` > 0),

    -- CHECK: tingkat must be within 1.0 – 10.0
    CONSTRAINT `chk_properties_tingkat_range`
        CHECK (`tingkat` BETWEEN 1.0 AND 10.0),

    -- Foreign key: created_by → users(id)
    -- RESTRICT on DELETE: prevents deleting a user who owns listings
    -- CASCADE on UPDATE: propagates user ID changes automatically
    CONSTRAINT `fk_properties_created_by`
        FOREIGN KEY (`created_by`)
        REFERENCES `users` (`id`)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,

    -- Index on created_by for efficient join/filter operations
    INDEX `idx_properties_created_by` (`created_by`),

    -- Index on status for quick availability queries
    INDEX `idx_properties_status` (`status`),

    -- Index on deleted_at to efficiently filter soft-deleted records
    INDEX `idx_properties_deleted_at` (`deleted_at`)

) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_unicode_ci
  COMMENT='Property listings with soft-delete support';


-- =============================================================
-- TABLE: audit_logs
-- Purpose : Immutable trail of all CREATE, UPDATE, and DELETE
--           actions performed on property records.
--           Rows are append-only; no updated_at is needed.
-- =============================================================
CREATE TABLE `audit_logs` (
    -- Primary identifier
    `id`              BIGINT UNSIGNED  NOT NULL AUTO_INCREMENT,

    -- Actor who performed the action
    `user_id`         BIGINT UNSIGNED  NOT NULL COMMENT 'FK → users(id); admin who triggered the action',

    -- Target property affected by the action
    `property_id`     BIGINT UNSIGNED  NOT NULL COMMENT 'FK → properties(id); property that was modified',

    -- Action type (e.g., CREATE, UPDATE, DELETE)
    `action`          VARCHAR(50)      NOT NULL COMMENT 'Verb describing the operation performed',

    -- Payload capturing state change (before → after)
    `changes_payload` JSON             NULL     COMMENT 'JSON object with "before" and "after" keys; NULL for CREATE actions',

    -- Log timestamp (immutable; no ON UPDATE behavior required)
    `created_at`      TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP,

    -- Constraints
    PRIMARY KEY (`id`),

    -- Foreign key: user_id → users(id)
    -- RESTRICT on DELETE: audit history must not be lost when a user is disabled
    -- CASCADE on UPDATE: keeps log consistent if user ID ever changes
    CONSTRAINT `fk_audit_logs_user_id`
        FOREIGN KEY (`user_id`)
        REFERENCES `users` (`id`)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,

    -- Foreign key: property_id → properties(id)
    -- CASCADE on DELETE: when a property is hard-deleted, its audit trail is removed too
    -- CASCADE on UPDATE: keeps log consistent if property ID ever changes
    CONSTRAINT `fk_audit_logs_property_id`
        FOREIGN KEY (`property_id`)
        REFERENCES `properties` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,

    -- Indexes for common query patterns
    INDEX `idx_audit_logs_user_id`     (`user_id`),
    INDEX `idx_audit_logs_property_id` (`property_id`),
    INDEX `idx_audit_logs_action`      (`action`),
    INDEX `idx_audit_logs_created_at`  (`created_at`)

) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_unicode_ci
  COMMENT='Append-only audit trail for property record changes';


SET FOREIGN_KEY_CHECKS = 1;

-- =============================================================
-- End of schema
-- =============================================================
