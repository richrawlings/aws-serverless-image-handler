# Smart cropping

---

## faces()

Automatically detect and crop faces using Amazon Rekognition.

#### Options

| Option    | Type | Description                                                                                                                               |
|:----------|:----:|:------------------------------------------------------------------------------------------------------------------------------------------|
| faceIndex | int  | Optional: Which face to use if multiple are found (zero-based from largest to smallest). If not specified, the largest face will be used. |
| padding   | int  | Optional: Pixels of padding around the cropped face                                                                                       |

##

#### Example: Largest detected face

```
craft.awsServerlessImageHandler.faces().cloudFrontUrl(image)
```

##

#### Example: Second-largest face with padding

```
{{ craft.awsServerlessImageHandler.faces({"faceIndex": 1, "padding": 20}).cloudFrontUrl(image) }}
```



##

---

## roundCrop()

Crop image in a circular or elliptical pattern.

#### Options

| Option  | Type | Description                                                                                                              |
|:--------|:----:|:-------------------------------------------------------------------------------------------------------------------------|
| radiusX | int  | Optional: Radius along the x-axis of the ellipse. Defaults to half the length of the smallest edge.                      |
| radiusY | int  | Optional: Radius along the y-axis of the ellipse. Defaults to half the length of the smallest edge.                      |
| top     | int  | Optional: Offset from the top of the image to the center of the ellipse. Defaults to half of the image height.           |
| left    | int  | Optional: Offset from the left-most edge of the image to the center of the ellipse. Defaults to half of the image width. |

##

#### Example: Simple round crop

```
{{ craft.awsServerlessImageHandler.roundCrop().cloudFrontUrl(image) }}
```

## 

#### Example: Ellipse with offset

```
{{ craft.awsServerlessImageHandler.roundCrop(100, 200, 50, 50).cloudFrontUrl(image) }}
```

##

---

## contentModeration()

Detect inappropriate content using Amazon Rekognition.

##


```
{{ craft.awsServerlessImageHandler.contentModeration().cloudFrontUrl(image) }}
```

##

---

Need help?

- [Report an issue](https://github.com/richrawlings/craft-aws-serverless-image-handler/issues)
- [Contact support](mailto:rich.rawlings@gmail.com?subject=AWS Serverless Image Handler plugin)