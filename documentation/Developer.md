# Developer Documentation
## Class `DefaultFlexFormItemsProvider`

### Purpose of the Class

The class `DefaultFlexFormItemsProvider` provides **default FlexForm item definitions** for the **DynamicFlexformLoader** extension.
It returns a structured list of **FlexForm item configurations** that are used to assign **custom, unique keys** to `tt_content` elements and make them accessible later in PHP via services.

This class acts as a **default provider** and can be extended or overridden by additional providers.

---

### Namespace & Context

```php
namespace MCEikens\DynamicFlexformLoader\Configuration;
```

The class is located in the configuration layer of the extension and does **not contain business logic**.
Its sole responsibility is to provide structured metadata.

---

### Service Registration & Autoconfiguration

```php
#[AutoconfigureTag('mceikens.dynamic_flexform_provider')]
```

Symfony attributes are used to automatically register this class as a service.

**Implications:**
- automatic service registration in the DI container
- tagged with `mceikens.dynamic_flexform_provider`
- discoverable by a central registry or aggregator service
- no manual `services.yaml` configuration required

---

### Interface: `FlexFormItemsProviderInterface`

The class implements `FlexFormItemsProviderInterface`, ensuring that all FlexForm providers:

- share a common return structure
- are interchangeable
- can be aggregated via dependency injection

---

### Public API

#### `getFlexFormItems(): array`

Returns an associative array of **FlexForm item definitions**.

**Conceptual structure:**

```php
[
    '<flexform-key>' => [
        'key'   => '<flexform-key>',
        'label' => '<backend label>',
        'data'  => [ /* optional metadata */ ],
    ],
]
```

---

### Example Implementation

```php
return [
    'default-type-1' => [
        'key' => 'default-type-1',
        'label' => 'Default Type 1',
        'data' => [
            'icon' => 'content-text',
            'description' => 'A default content type',
        ],
    ],
    'default-type-2' => [
        'key' => 'default-type-2',
        'label' => 'Default Type 2',
    ],
];
```

---

### Field Description

| Field | Required | Description |
|----|----|----|
| Array key | ✅ | Unique identifier of the FlexForm type |
| `key` | ✅ | Explicit type key (e.g. for mapping or serialization) |
| `label` | ✅ | Human-readable label (backend / UI) |
| `data` | ❌ | Optional metadata |

---

### `data` Array

The `data` array is **intentionally flexible** and not evaluated by this class.

Possible use cases:
- backend icon references
- descriptions or help texts
- feature flags
- mapping information for services or rendering logic

---

### Role Within the Extension

- provides default FlexForm types
- designed for modular extensibility
- accessed indirectly through a central service
- no direct dependency on TYPO3 core APIs

---

### Extensibility

Additional FlexForm providers can be added by:

- creating new classes with the `AutoconfigureTag` attribute
- implementing the same provider interface
- relying on automatic container registration
