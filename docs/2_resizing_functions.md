# Resizing functions

---

## Extract

Extract / crop a region of the image.

- Use extract before resize for pre-resize extraction.
- Use extract after resize for post-resize extraction.
- Use extract twice and resize once for extract-then-resize-then-extract in a fixed operation order.

#### Options

| Option | Type | Description                 |
|:-------|:----:|:----------------------------|
| left   | int  | Offset from left edge       |
| top    | int  | Offset from top edge        |
| width  | int  | Width of region to extract  |
| height | int  | Height of region to extract |

##

#### Example: Extract a 100x100 portion of an image, 20 pixels from the top left

```
{{ craft.awsServerlessImageHandler.extract(20, 20, 100, 100).cloudFrontUrl(image) }}
```

##

---

## Extend

Extend / pad / extrude one or more edges of the image with either the provided background colour or pixels derived from the image. This operation will always occur after resizing and extraction, if any.

#### Options

| Option     |      Type       | Description                                                                                                     |
|:-----------|:---------------:|:----------------------------------------------------------------------------------------------------------------|
| top        |       int       | Optional: Top padding in pixels (defaults to `0`)                                                               |
| left       |       int       | Optional: Left padding in pixels (defaults to `0`)                                                              |
| bottom     |       int       | Optional: Bottom padding in pixels (defaults to `0`)                                                            |
| right      |       int       | Optional: Right padding in pixels (defaults to `0`)                                                             |
| extendWith |     string      | Optional: Populate new pixels using one of: `background`, `copy`, `repeat`, `mirror` (defaults to `background`) |
| background | string / object | Optional: Background colour (defaults to black with no transparency e.g. `{r: 0, g: 0, b: 0, alpha: 1}` )       |

##

#### Example: Resize to 140 pixels wide, then add 10 transparent pixels to the top, left and right edges and 20 to the bottom edge

```
{{ craft.awsServerlessImageHandler.resize(140).extend(10, 10, 20, 10, {
    r: 0,
    g: 0,
    b: 0,
    alpha: 0
}).cloudFrontUrl(image) }}
```

##

#### Example: Add a row of 10 red pixels to the bottom

```
{{ craft.awsServerlessImageHandler.extend(null, null, 10, null, 'red').cloudFrontUrl(image) }}
```

##

---

## Resize

Resize image to width, height or width x height.

When both a width and height are provided, the possible methods by which the image should fit these are:

**cover**: (default) Preserving aspect ratio, attempt to ensure the image covers both provided dimensions by cropping/clipping to fit.

**contain**: Preserving aspect ratio, contain within both provided dimensions using "letterboxing" where necessary.

**fill**: Ignore the aspect ratio of the input and stretch to both provided dimensions.

**inside**: Preserving aspect ratio, resize the image to be as large as possible while ensuring its dimensions are less than or equal to both those specified.

**outside**: Preserving aspect ratio, resize the image to be as small as possible while ensuring its dimensions are greater than or equal to both those specified.

Refer to the [Sharp documentation](https://sharp.pixelplumbing.com/api-resize#resize) for further details and options.

#### Options

| Option             |      Type       | Description                                                                                                                                                       |
|:-------------------|:---------------:|:------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| width              |       int       | Optional: How many pixels wide the resultant image should be                                                                                                      |
| height             |       int       | Optional: How many pixels high the resultant image should be                                                                                                      |
| fit                |     string      | Optional: How the image should be resized/cropped to fit the target dimension(s), one of `cover`, `contain`, `fill`, `inside` or `outside`                        |
| position           |     string      | Optional: A position, gravity or strategy to use when `fit` is `cover` or `contain`                                                                               |
| background         | string / object | Optional: Background colour when `fit` is `contain`                                                                                                               |
| kernel             |     string      | Optional: The kernel to use for image reduction                                                                                                                   |
| withoutEnlargement |      bool       | Optional: Do not scale up if the width or height are already less than the target dimensions                                                                      |
| withoutReduction   |      bool       | Optional: Do not scale down if the width or height are already greater than the target dimensions                                                                 |
| fastShrinkOnLoad   |      bool       | Optional: Take greater advantage of the JPEG and WebP shrink-on-load feature, which can lead to a slight moiré pattern or round-down of an auto-scaled dimension. |

##

#### Example: Resize to 100 pixels wide, maintaining aspect ratio

```
{{ craft.awsServerlessImageHandler.resize(100).cloudFrontUrl(image) }}
```

##

#### Example: Resize to 100x100 cropped square

```
{{ craft.awsServerlessImageHandler.resize(100, 100, {"fit": "cover"}).cloudFrontUrl(image) }}
```


##

---

## Trim

Trim pixels from all edges that contain values similar to the given background colour, which defaults to that of the top-left pixel.

Images with an alpha channel will use the combined bounding box of alpha and non-alpha channels.

If the result of this operation would trim an image to nothing then no change is made.

#### Options

| Option     |      Type       | Description                                                                                           |
|:-----------|:---------------:|:------------------------------------------------------------------------------------------------------|
| background | string / object | Optional: Background colour (defaults to the top-left pixel)                                          |
| threshold  |       int       | Optional: Allowed difference from the above colour, a positive number (defaults to `10`)              |
| lineArt    |      bool       | Optional: Does the input more closely resemble line art (e.g. vector) rather than being photographic? |

##

#### Example: Trim pixels with a colour similar to that of the top-left pixel

```
{{ craft.awsServerlessImageHandler.trim().cloudFrontUrl(image) }}
```

##

#### Example: Trim pixels with the exact same colour as that of the top-left pixel

```
{{ craft.awsServerlessImageHandler.trim(null, 0).cloudFrontUrl(image) }}
```

##

#### Example: Assume input is line art and trim only pixels with a similar colour to red

```
{{ craft.awsServerlessImageHandler.trim("#FF0000", null, true).cloudFrontUrl(image) }}
```

##

---

Need help?

- [Report an issue](https://github.com/richrawlings/craft-aws-serverless-image-handler/issues)
- [Contact support](mailto:rich.rawlings@gmail.com?subject=AWS Serverless Image Handler plugin)