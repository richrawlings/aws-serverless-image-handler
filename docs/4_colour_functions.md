# Colour functions

---

## blur()

Blur the image.

When used without parameters, performs a fast 3x3 box blur (equivalent to a box linear filter).

When a sigma is provided, performs a slower, more accurate Gaussian blur.

#### Options

| Option | Type | Description                                                                                            |
|:-------|:----:|:-------------------------------------------------------------------------------------------------------|
| sigma  | int  | a value between 0.3 and 1000 representing the sigma of the Gaussian mask, where sigma = 1 + radius / 2 |

##

#### Example: Default blur

```
{{ craft.awsServerlessImageHandler.blur().cloudFrontUrl(image) }}
```

##

#### Example: Gaussian blur

```
{{ craft.awsServerlessImageHandler.blur(5).cloudFrontUrl(image) }}
```


##

---

## clahe()

Perform contrast limiting adaptive histogram equalization (CLAHE).

This will, in general, enhance the clarity of the image by bringing out darker details.

#### Options

| Option   | Type | Description                                                                          |
|:---------|:----:|:-------------------------------------------------------------------------------------|
| width    | int  | Integral width of the search window, in pixels                                       |
| height   | int  | Integral height of the search window, in pixels                                      |
| maxSlope | int  | Integral level of brightening, between 0 and 100, where 0 disables contrast limiting |

##

#### Example

```
{{ craft.awsServerlessImageHandler.clahe(3, 3).cloudFrontUrl(image) }}
```

##

---

## flatten()

Merge alpha transparency channel, if any, with a background, then remove the alpha channel.

#### Options

| Option     |      Type       | Description                           |
|:-----------|:---------------:|:--------------------------------------|
| background | string / object | Background colour, defaults to black. |

##

#### Example

```
{{ craft.awsServerlessImageHandler.flatten('#F0A703').cloudFrontUrl(image) }}
```

##

---

## flip()

Mirror the image vertically (up-down) about the x-axis. This always occurs before rotation, if any.

#### Example

```
{{ craft.awsServerlessImageHandler.flip().cloudFrontUrl(image) }}
```

##

---

## flop()

Mirror the image horizontally (left-right) about the y-axis. This always occurs before rotation, if any.

#### Example

```
{{ craft.awsServerlessImageHandler.flop().cloudFrontUrl(image) }}
```

##

---

## gamma()

Apply a gamma correction by reducing the encoding (darken) pre-resize at a factor of 1/gamma then increasing the encoding (brighten) post-resize at a factor of gamma.

#### Options

| Option   | Type  | Description                                                      |
|:---------|:-----:|:-----------------------------------------------------------------|
| gamma    | float | Value between 1.0 and 3.0                                        |

##

#### Example

```
{{ craft.awsServerlessImageHandler.gamma(1.5).cloudFrontUrl(image) }}
```

##

---

## median()

Apply median filter. When used without parameters the default window is 3x3.

#### Options

| Option | Type | Description                               |
|:-------|:----:|:------------------------------------------|
| size   | int  | Value between 1.0 and 3.0 (defaults to 3) |

##

#### Example

```
{{ craft.awsServerlessImageHandler.median(1.5).cloudFrontUrl(image) }}
```

##

---

## modulate()

Transforms the image using brightness, saturation, hue rotation, and lightness.

#### Options

| Option     | Type  | Description                        |
|:-----------|:-----:|:-----------------------------------|
| brightness |  int  | Optional: Brightness multiplier    |
| saturation | float | Optional: Saturation multiplier    |
| hue        | float | Optional: Degrees for hue rotation |
| lightness  | float | Optional: Lightness added          |

##

#### Example: Increase brightness by factor of 2

```
{{ craft.awsServerlessImageHandler.modulate(2).cloudFrontUrl(image) }}
```

##

---

## negate()

Produce the "negative" of the image.

#### Options

| Option | Type | Description                                                             |
|:-------|:----:|:------------------------------------------------------------------------|
| alpha  | bool | Optional: Whether or not to negate any alpha channel (defaults to true) |

##

#### Example

```
{{ craft.awsServerlessImageHandler.negate().cloudFrontUrl(image) }}
```

##

---

## normalise()

Enhance output image contrast by stretching its luminance to cover a full dynamic range.

Uses a histogram-based approach, taking a default range of 1% to 99% to reduce sensitivity to noise at the extremes.

Luminance values below the lower percentile will be underexposed by clipping to zero. Luminance values above the upper percentile will be overexposed by clipping to the max pixel value.

#### Options

| Option | Type | Description                                                           |
|:-------|:----:|:----------------------------------------------------------------------|
| lower  | int  | Optional: Percentile below which luminance values will be underexposed |
| upper  | int  | Optional: Percentile above which luminance values will be overexposed |

##

#### Example

```
{{ craft.awsServerlessImageHandler.normalise().cloudFrontUrl(image) }}
```

##

#### Example: Alternative spelling

```
{{ craft.awsServerlessImageHandler.normalize().cloudFrontUrl(image) }}
```

##

---

## rotate()

Rotate the output image by an explicit angle.

The angle is converted to a valid positive degree rotation. For example, -450 will produce a 270 degree rotation.

When rotating by an angle other than a multiple of 90, the background colour can be provided with the background option.

#### Options

| Option     |  Type  | Description                                                  |
|:-----------|:------:|:-------------------------------------------------------------|
| angle      |  int   | Percentile below which luminance values will be underexposed |
| background | object | Optional: Background colour                                  |

##

#### Example: Rotate 45 degrees

```
{{ craft.awsServerlessImageHandler.rotate(45).cloudFrontUrl(image) }}
```

##

#### Example: Rotate 45 degrees with background

```
{{ craft.awsServerlessImageHandler.rotate(45, {"r": 120, "g": 120, "b": 120}).cloudFrontUrl(image) }}
```

---

## sharpen()

Sharpen the image.

When used without parameters, performs a fast, mild sharpen of the output image.

When a sigma is provided, performs a slower, more accurate sharpen of the L channel in the LAB colour space. Fine-grained control over the level of sharpening in "flat" (m1) and "jagged" (m2) areas is available.

#### Options

| Option | Type  | Description                                                                                       |
|:-------|:-----:|:--------------------------------------------------------------------------------------------------|
| sigma  |  int  | Sigma of the Gaussian mask, where sigma = 1 + radius / 2, between 0.000001 and 10                 |
| m1     | float | Optional: Level of sharpening to apply to "flat" areas, between 0 and 1000000 (defaults to 1.0)   |
| m2     | float | Optional: Level of sharpening to apply to "jagged" areas, between 0 and 1000000 (defaults to 2.0) |
| x1     | float | Optional: Threshold between "flat" and "jagged", between 0 and 1000000                            |
| y2     | float | Optional: Maximum amount of brightening, between 0 and 1000000                                    |
| y3     | float | Optional: Maximum amount of darkening, between 0 and 1000000                                      |

##

#### Example

```
{{ craft.awsServerlessImageHandler.sharpen().cloudFrontUrl(image) }}
```

##

---

## threshold()

Any pixel value greater than or equal to the threshold value will be set to 255, otherwise it will be set to 0.

#### Options

| Option    | Type  | Description                                                                                                |
|:----------|:-----:|:-----------------------------------------------------------------------------------------------------------|
| threshold |  int  | A value in the range 0-255 representing the level at which the threshold will be applied (defaults to 128) |

##

#### Example

```
{{ craft.awsServerlessImageHandler.threshold(200).cloudFrontUrl(image) }}
```

##



---

## unflatten()

Ensure the image has an alpha channel with all white pixel values made fully transparent.

Existing alpha channel values for non-white pixels remain unchanged.

```
{{ craft.awsServerlessImageHandler.unflatten().cloudFrontUrl(image) }}
```


##

---

Need help?

- [Report an issue](https://github.com/richrawlings/craft-aws-serverless-image-handler/issues)
- [Contact support](mailto:rich.rawlings@gmail.com?subject=AWS Serverless Image Handler plugin)