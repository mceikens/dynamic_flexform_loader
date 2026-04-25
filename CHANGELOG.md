# Changelog

## [1.0.0] – 2026-01-29
**Initial Release**

### Features
- Introduction of the TYPO3 extension `dynamic_flexform_loader`.
- Enables dynamic loading of FlexForm configurations for TYPO3 extensions.
- Fully compatible with TYPO3 v13 LTS (current development status).

### Installation
- Extension can be integrated via Composer or directly into the TYPO3 project.

### Known Issues
- No known issues at the time of release.

### Notes
- This is the first stable release (v1.0.0).
- Additional features, bug fixes and optimisations will be documented in future versions.


## [2.0.0] – 2026-04-25

### Breaking Changes
- Flexform settings for `dynamic_flexform_loader` are now decoupled from `pi_flexform`
  into a dedicated key – existing configurations must be migrated manually.

### Compatibility
- TYPO3 14 LTS support added.
- Updated `composer.json` dependencies to reflect TYPO3 14 requirements.
- Codebase adapted to TYPO3 14 API changes.

### Documentation
- Extended documentation to cover all changes and migration steps.

### Migration Notes
- Due to the decoupling of the flexform settings from `pi_flexform`, a manual
  migration of existing FlexForm configurations is required before upgrading.
- Please refer to the updated documentation for detailed migration instructions.