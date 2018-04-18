# Getting Started Tutorial

Extensions are made of different, but cohesive, components. Components can include[background scripts](https://developer.chrome.com/background_pages.html),[content scripts](https://developer.chrome.com/content_scripts.html), an[options page](https://developer.chrome.com/optionsV2),[UI elements](https://developer.chrome.com/user_interface.html)and various logic files. Extension components are created with web development technologies: HTML, CSS, and JavaScript. An extension's components will depend on its functionality and may not require every option.

This tutorial will build an extension that allows the user to change the background color of any page on[developer.chrome.com](https://developer.chrome.com/). It will use many core components to give an introductory demonstration of their relationships.

To start, create a new directory to hold the extension's files.

The completed extension can be downloaded [here](https://developer.chrome.com/extensions/examples/tutorials/get_started_complete.zip).

## Create the Manifest {#manifest}

Extensions start with their[manifest](https://developer.chrome.com/manifest). Create a file called`manifest.json`and include the following code, or download the file [here](https://developer.chrome.com/extensions/examples/tutorials/get_started/manifest.json).

```
  {
    "name": "Getting Started Example",
    "version": "1.0",
    "description": "Build an Extension!",
    "manifest_version": 2
  }
 
```



> 官方文档：[https://developer.chrome.com/extensions/getstarted](https://developer.chrome.com/extensions/getstarted)



