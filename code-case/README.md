# Code Case 

Convert the argument into another code case.

This workflow is a fork of the origin Code Case workflow that can be downloaded [here](http://www.packal.org/workflow/code-case).
The current workflow add two conversions: 
- NPM image: to build a NPM image name from a branch name, as it is built on the Jenkins Job before publishing a library. The purpose is to get the name of the image (resulting from a pull request on the lib) to put in the `package.json` file.
- Docker image: to build a Docker image name from a branch name, as it is build on the Jenkins Job before publishing a service. The prupose is to get the name of the image (resulting from a pull request on the service) to put in the `.crane.env` file.

## How to use
```
codecase feature/my-branch-is-awesome
```

And press enter to copy the converted string in the clipboard.

