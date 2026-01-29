# DynamicFlexFormLoader

This extension solves a classic problem in TYPO3 development: accessing specific content element configurations (FlexForms) without having to use hard-coded UIDs.

It allows content elements to be marked with unique keys and their settings to be retrieved directly via this key – ideal for global configuration elements such as footer data, API keys or layout settings.

## Core functions
- Identification via keys: A self-defined, unique key can be stored in the content elements. 
- UID-independent data retrieval: Developers can query the FlexForm settings of an element directly via the key. It is not necessary to know on which page or under which UID the element exists. 
- Clean API: Provides a simple way to access configuration content elements system-wide.


## Requirements
- TYPO3: v13.0 or later
- PHP: ^8.4

## Installation
```bash
 composer require mceikens/dynamic-flexform-loader
```
## Why this extension?
Normally, FlexForm data is linked to a specific instance of a content element. If you want to use this data on all pages (e.g. social media links from a central footer element), you often had to work with fixed UIDs (inflexible during deployment) or use Typoscript constructs. This extension makes the process dynamic and developer-friendly.