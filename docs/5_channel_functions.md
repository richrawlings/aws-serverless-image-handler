# Channel functions

---

## removeAlpha()

Remove alpha channel.

```
{{ craft.awsServerlessImageHandler.removeAlpha().cloudFrontUrl(image) }}
```

##

---

## ensureAlpha()

Ensure the output image has an alpha transparency channel. If missing, the added alpha channel will have the specified transparency level, defaulting to fully-opaque (1).

#### Options

| Option  | Type | Description                                                              |
|:--------|:----:|:-------------------------------------------------------------------------|
| alpha   | int  | Optional: alpha transparency level (0=fully-transparent, 1=fully-opaque) |

##

#### Example: Fully opaque alpha channel

```
{{ craft.awsServerlessImageHandler.ensureAlpha().cloudFrontUrl(image) }}
```

##

#### Example: Fully transparent alpha channel

```
{{ craft.awsServerlessImageHandler.ensureAlpha(0).cloudFrontUrl(image) }}
```

##

---

## extractChannel()

Extract a single channel from a multi-channel image.

#### Options

| Option  |     Type     | Description                                                               |
|:--------|:------------:|:--------------------------------------------------------------------------|
| channel | int / string | Zero-indexed channel/band number to extract, or red, green, blue or alpha |

##

#### Example: Extract the green channel

```
{{ craft.awsServerlessImageHandler.extractChannel('green').cloudFrontUrl(image) }}
```

##

---

Need help?

- [Report an issue](https://github.com/richrawlings/craft-aws-serverless-image-handler/issues)
- [Contact support](mailto:rich.rawlings@gmail.com?subject=AWS Serverless Image Handler plugin)