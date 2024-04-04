## AWS Serverless Image Handler
##### CRAFT CMS PLUGIN
###### Copyright © Richard Rawlings <rich.rawlings@gmail.com>

##

---

# Intro




---

## Requirements

- working serverless image handler solution
- craft v4
- S3 plugin from Pixel & Tonic (link)


--- 

## Installation

- plugin store or Composer  


---

## Setup

- Create env var for AWS_SERVERLESS_DISTRIBUTION
- Create an S3 filesystem that points at the bucket chosen when setting up serverless image handler on AWS. Recommend a specific subfolder to separate from regular siute assets 
- Go to Settings > Plugins > Serverless Image Handler, add distribution id (using env var)


---

## Static transformations

- Go to Settings > Assets > Serverless Image Handler 
- Create transformations
- twig examples using handles



---

## Dynamic transformations

- explain you can create transformations on the fly directly from twig
- example showing how to build dynamic transformations in twig



---

## Troubleshooting

- common issues - S3 bucket policy etc





##

---

Need help?

- [Read the docs](https://github.com/richrawlings/craft-aws-serverless-image-handler/wiki/Documentation)
- [Report an issue](https://github.com/richrawlings/craft-aws-serverless-image-handler/issues)
- [Contact support](mailto:rich.rawlings@gmail.com?subject=AWS Serverless Image Handler plugin)