# Get started

---

## Introduction

This plugin implements the [Serverless Image Handler](https://aws.amazon.com/solutions/implementations/serverless-image-handler/) service from AWS into [Craft CMS](https://craftcms.com/) (version 4 and above).

Serverless Image Handler on AWS creates a serverless architecture to provide cost-effective image processing and CDN delivery in the cloud. The architecture combines AWS services with [Sharp](https://sharp.pixelplumbing.com/), a powerful open-source image processing software, and is optimised for dynamic 'on-the-fly' image manipulation.

##

---

## Benefits

**Dynamic content delivery**: 
Deliver dynamic images at run-time based on your users’ device, including automatic Webp conversion if the requesting client supports it.

**Complex image transformations**: 
Choose from a wide range of image manipulation functions. Chain them to create complex image transitions, automatically storing the result at the edge for super fast delivery.

**Smart cropping**: 
Crop images using the facial recognition capabilities of [Amazon Rekognition](https://aws.amazon.com/rekognition/).

**Content moderation**: 
Detect and blur inappropriate images using [Amazon Rekognition](https://aws.amazon.com/rekognition/image-features/).

**Cache busting**: Cached assets in CloudFront are cleared when images are updated or deleted.

##

---

## Requirements

Before installing the plugin you need to satisfy the following requirements:


- Create an S3 bucket to store your origin assets.


- Install the [Amazon S3 plugin](https://plugins.craftcms.com/aws-s3) for Craft and configure it using the bucket you created in step 1.


- Set up the Serverless Image Handler service in your AWS account using the bucket you created in step 1 as the origin. In most cases this is simply a case of launching setup in your AWS console and following the steps. It only takes a few minutes.

Learn about [Serverless Image Handler](https://aws.amazon.com/solutions/implementations/serverless-image-handler/)

Read the [Implementation guide](https://docs.aws.amazon.com/solutions/latest/serverless-image-handler/solution-overview.html)

Launch setup in your [AWS console](https://console.aws.amazon.com/cloudformation/home?region=us-east-1#/stacks/new?stackName=ServerlessImageHandler&templateURL=https://solutions-reference.s3.amazonaws.com/serverless-image-handler/latest/serverless-image-handler.template)


##

---

## Configuration

Once you have a working Serverless Images Handler implementation on AWS you can install the plugin via the Plugin Store.

Once installed, visit the plugin settings page and enter your:

- S3 bucket name
- CloudFront Distribution ID
- Cloudfront Subdomain

Using environment variables is recommended.

##

---

## Usage

This plugin provides a suite of twig functions that generate encoded CloudFront URLs on the fly with your chosen image transformations baked in. Images are immediately saved to (and served from) AWS edge server for optimum performance..

Multiple functions can be chained to produce complex transformations in a single action e.g. `resize` -> `rotate` -> `grayscale` -> `sharpen`.

The last function in the chain **MUST** be the `cloudFrontUrl` function. Pass your Craft asset to this function, for example:

##

```
{% for article in craft.entries().section('blog').all() %}
    {% set image = article.image.one() %}
    <img src="{{ craft.awsServerlessImageHandler.resize(600).rotate(45).grayscale().sharpen().cloudFrontUrl(image} }}"
{% endfor %}
```

##

If anything other than an asset object is passed to `cloudFrontUrl`, an empty string will be returned.

##

---

## Support

Support on plugin usage will be provided (open an issue) but I cannot provide support with setting up Serverless Image Handler, your S3 bucket security, or anything relating to AWS. If you run into problems let me know and I will try to help, but may need to refer you to AWS support.

##

---

Need help?

- [Report an issue](https://github.com/richrawlings/craft-aws-serverless-image-handler/issues)
- [Contact support](mailto:rich.rawlings@gmail.com?subject=AWS Serverless Image Handler plugin)