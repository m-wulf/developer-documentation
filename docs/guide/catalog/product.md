# Product

The built-in Product Content Type contains the following Fields:

|Name | Identifier | Type | Description |
|---|---|---|---|
|Productname | `ses_name` | `ezstring` | Main name of the product. Used to create the URL |
|Product type | `ses_type` | `ezselection` | |
|SKU | `ses_sku` | `ezstring` | Unique Stock keeping unit |
|Subtitle | `ses_subtitle` | `ezstring` | Additional product name |
|Short description | `ses_short_description` | `ezrichtext` | Short product description |
|Long description | `ses_long_description` | `ezrichtext` | Long product description  |
|Specifications | `ses_specifications` | `sesspecificationstype` | A set of product specification values. They are indexed in the search engine and can be used for faceted search |
|EAN | `ses_ean` | `ezstring` | European Article Number |
|Variants | `ses_variants` | `uivarvarianttype` | [Product variants](#product-variants) |
|Manufacturer SKU | `ses_manufacturer_sku` | `ezstring` | SKU of the product  as assigned by the manufacturer |
|Unit price | `ses_unit_price` | `ezstring` | Product price |
|Product image | `ses_image_main` | ezimage | Main product image |
|Manufacturer | `ses_manufacturer` | ezstring | Manufacturer name |
|Color | `ses_color` | `ezstring` | Product color |
|Technical specification | `ses_specification` | `eztext` | Technical product description |
|Video | `ses_video` | `ezstring` | Link to a product video |
|Add. Product image 1-4 | `ses_image_1` | `ezimage` | Up to four additional images | 
|Currency | `ses_currency` | `ezstring` | Default product currency |
|VAT Code | `ses_vat_code` | `sesselection` | One of predefined VAT rates |
|Product Type | `ses_product_type` | `ezstring` | Product type used for grouping products in comparison |
|Packaging unit | `ses_packaging_unit` | `ezstring` | Product packaging unit |
|Min order quantity | `ses_min_order_quantity` | `ezstring` | Minimum quantity that can be ordered |
|Max order quantity | `ses_max_order_quantity` | `ezstring` | Maximum quantity that can be ordered |
|Unit | `ses_unit` | `ezstring` | Product unit |
|Stock numeric | `ses_stock_numeric` | `ezstring` | |
|Discontinued | `ses_discontinued` | `ezboolean` | Flag to indicate if the product is discontinued |
|Tags | `tags` | `ezkeyword` | Product keywords |

## Custom product Content Type

`Ez5CatalogDataProvider` defines which Content Type is treated as products
and which Field in Product Content items is treated as SKU:

``` php
const EZ_PRODUCT_CONTENT_TYPE_IDENTIFIER = 'ses_product';
const EZ_PRODUCT_SKU_FIELD_IDENTIFIER = 'ses_sku';
```

If you replace the built-in product with a custom Content Type, you need to replace these constants.

You also need to configure the Content Type to be treated as `createOrderableProductNode`:

``` yaml
parameters.silver_eshop.default.catalog_factory.<content_type_identifier>: createOrderableProductNode
```

## Product specifications

You can configure the available product specifications and default values by using the following configuration:

``` yaml
siso_core.default.specification_groups:
    -
        code: "technic"
        label: "Technical data"
        default_values:
            -
                id: width
                label: "Width"
                value: ""
                options: ['mm','cm', 'in']
            -
                id: diameter
                label: "Diameter"
                value: ""
                options: ['mm','cm']
```

With the optional `option` attribute you can add a select field that offers, for example, a selection of units.
