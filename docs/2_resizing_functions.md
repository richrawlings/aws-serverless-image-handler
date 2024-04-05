# Resizing functions

---

## Extract

An intro here

Examples

##

---

## Extend

An intro here

Examples

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
| threshold  |       int       | Optional: Allowed difference from the above colour, a positive number (defaults to 10)                |
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