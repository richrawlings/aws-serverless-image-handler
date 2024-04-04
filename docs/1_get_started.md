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

## Support

I will provide support on plugin usage but cannot provide support with setting up Serverless Image Handler on AWS. If you run into problems let me know and I will try to help if time permits, but may need to refer you to AWS support.

##

---

Need help?

- [Report an issue](https://github.com/richrawlings/craft-aws-serverless-image-handler/issues)
- [Contact support](mailto:rich.rawlings@gmail.com?subject=AWS Serverless Image Handler plugin)