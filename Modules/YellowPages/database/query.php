<!-- vcard table -->
ALTER TABLE `vcard` ADD COLUMN `is_active` TINYINT(1) NOT NULL DEFAULT 0;

<!-- user table -->
ALTER TABLE `users` ADD COLUMN `aadhar` VARCHAR(12) NULL;
