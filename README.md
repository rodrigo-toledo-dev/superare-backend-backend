# These are the instructions for the project

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

## Configuration

Read and edit `config/app.php` and setup the `'Email'` and any other
configuration relevant for your application.

## Shell Scripts

To run shell scripts first you need setup the `'Email'` configurations. The file it's `config/app.php`. After this edit the file `'src/Shell/CheckServerStatusShell.php'` uncomment the part of code that run the email with right informations.

## Warning

To run the server status shell task the nodeAPI application must be up. In the API project run `'npm run dev'`


## Check the servers status

To check the servers just run `'bin/cake checkServerStatus'`
