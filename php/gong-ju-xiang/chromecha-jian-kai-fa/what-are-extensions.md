## What are extensions?

Extensions are small software programs that customize the browsing experience. They enable users to tailor Chrome functionality and behavior to individual needs or preferences. They are built on web technologies such as HTML, JavaScript, and CSS.

An extension must fulfill a [single purpose](https://developer.chrome.com/single_purpose) that is narrowly defined and easy to understand. A single extension can include multiple components and a range of functionality, as long as everything contributes towards a common purpose.

![](https://developer.chrome.com/static/images/index/gmail-small.png "A screenshot of an extension&apos;s icon in the browser bar")User interfaces should be minimal and have intent. They can range from a simple icon, such as the [Google Mail  Checker extension](https://developer.chrome.com/samples#google-mail-checker) shown on the right, to [overriding](https://developer.chrome.com/override) an entire page.

Extension files are zipped into a single`.crx`package that the user downloads and installs. This means extensions do not depend on content from the web, unlike ordinary web apps.

Extensions are distributed through the [Chrome Developer Dashboard](https://chrome.google.com/webstore/developer/dashboard) and published to the [Chrome Web Store](http://chrome.google.com/webstore). For more information, see the [store developer documentation](http://code.google.com/chrome/webstore).

## Hello Extensions {#hello-extensions}

Take a small step into extensions with this quick Hello Extensions example. Start by creating a new directory to store the extension's files, or download them from the [sample page](https://developer.chrome.com/extensions/samples#search:hello).

Next, add a file called`manifest.json`and include the following code:

```
  {
    "name": "Hello Extensions",
    "description" : "Base Level Extension",
    "version": "1.0",
    "manifest_version": 2
  }
```

Every extension requires a manifest, though most extensions will not do much with just the manifest. For this quick start, the extension has a popup file and icon declared under the[`browser_action`](https://developer.chrome.com/browserAction)field:

```
  {
    "name": "Hello Extensions",
    "description" : "Base Level Extension",
    "version": "1.0",
    "manifest_version": 2,
    "browser_action": {
      "default_popup": "hello.html",
      "default_icon": "hello_extensions.png"
    }
  }
```

Download[`hello_extensions.png`here](https://developer.chrome.com/static/images/index/hello_extensions.png) and then create a file titled`hello.html`:

```
  <html>
    <body>
      <h1>Hello Extensions</h1>
    </body>
  </html>
```

The extension now displays`hello.html`when the icon is clicked. The next step is to include a command in the`manifest.json`that enables a keyboard shortcut. This step is fun, but not necessary:

```
  {
    "name": "Hello Extensions",
    "description" : "Base Level Extension",
    "version": "1.0",
    "manifest_version": 2,
    "browser_action": {
      "default_popup": "hello.html",
      "default_icon": "hello_extensions.png"
    },
    "commands": {
      "_execute_browser_action": {
        "suggested_key": {
          "default": "Ctrl+Shift+F",
          "mac": "MacCtrl+Shift+F"
        },
        "description": "Opens hello.html"
      }
    }
  
  }
```

The last step is to install the extension on your local machine.

1. Navigate to`chrome://extensions`in your browser. You can also access this page by clicking on the Chrome menu on the top right side of the Omnibox, hovering over **More Tools **and selecting **Extensions**.
2. Check the box next to **Developer Mode**.
3. Click **Load Unpacked Extension **and select the directory for your "Hello Extensions" extension.

Congratulations! You can now use your popup-based extension by clicking the`hello_world.png`icon or by pressing`Ctrl+Shift+F`on your keyboard.

