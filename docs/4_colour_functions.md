# Colour functions

---

## tint()

Tint the image using the provided colour. An alpha channel may be present and will be preserved.

#### Options

| Option | Type | Description        |
|:-------|:----:|:-------------------|
| red    | int  | Red colour value   |
| green  | int  | Green colour value |
| blue   | int  | Blue colour value  |

##

#### Example: Tint an image red

```
{{ craft.awsServerlessImageHandler.tint(255, 0, 0).cloudFrontUrl(image) }}
```

##

---

## greyscale()

Convert to 8-bit greyscale; 256 shades of grey. If the input image is in a non-linear colour space such as sRGB, use gamma() with greyscale() for the best results.

##

#### Example: Default function spelling

```
{{ craft.awsServerlessImageHandler.greyscale().cloudFrontUrl(image) }}
```

##

#### Example: Alternative function spelling

```
{{ craft.awsServerlessImageHandler.grayscale().cloudFrontUrl(image) }}
```

##

---

## pipelineColourspace()

Set the pipeline colourspace.

The input image will be converted to the provided colourspace at the start of the pipeline. All operations will use this colourspace before converting to the output colourspace, as defined by `toColourspace`. **Experimental**.

#### Options

| Option      |  Type  | Description                                         |
|:------------|:------:|:----------------------------------------------------|
| colourspace | string | Pipeline colourspace e.g. `rgb16`, `scrgb`, `lab`, `grey16` |

##

#### Example: Set pipeline colourspace to `grey16`

```
{{ craft.awsServerlessImageHandler.pipelineColourspace('grey16').cloudFrontUrl(image) }}
```

##

#### Example: Alternative function spelling

```
{{ craft.awsServerlessImageHandler.pipelineColorspace('grey16').cloudFrontUrl(image) }}
```

##

---

## toColourspace()

Set the output colourspace. By default output image will be web-friendly sRGB, with additional channels interpreted as alpha channels.

#### Options

| Option      |  Type  | Description                                               |
|:------------|:------:|:----------------------------------------------------------|
| colourspace | string | Output colourspace e.g. `rgb16`, `scrgb`, `lab`, `grey16` |

##

#### Example: Set output colourspace to `rgb16`

```
{{ craft.awsServerlessImageHandler.toColourspace('rgb16').cloudFrontUrl(image) }}
```

##

#### Example: Alternative function spelling

```
{{ craft.awsServerlessImageHandler.toColorspace('rgb16').cloudFrontUrl(image) }}
```



##

---

Need help?

- [Report an issue](https://github.com/richrawlings/craft-aws-serverless-image-handler/issues)
- [Contact support](mailto:rich.rawlings@gmail.com?subject=AWS Serverless Image Handler plugin)