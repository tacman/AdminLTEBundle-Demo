# AdminLTE-Bundle Demo

This repository contains an example Symfony 4 and Symfony 5 application for the [AdminLTE-Bundle](https://github.com/kevinpapst/AdminLTEBundle).

It serves as a living documentation for first time users and easier testing of theme features.

Please read the [theme documentation](https://github.com/kevinpapst/AdminLTEBundle/blob/master/Resources/docs/) for more information on how to use this theme.


# Installation

Symfony 4:

```bash
composer create-project kevinpapst/adminlte-bundle-demo 
```

Symfony 5:

```bash
git clone https://github.com/tacman/AdminLTEBundle-Demo.git
cd AdminLTEBundle-Demo
git checkout symfony5
composer install && yarn install && yarn run encore dev
```

Use the Symfony CLI to run a test server and to compile the assets in the background. Watch the assets in the background if you're going to change them.

```bash
symfony server:start -d 
symfony run -d yarn run encore dev --watch
```

and see it running at [http://127.0.0.1:8000](http://127.0.0.1:8000)

## Frontend assets


## Testing different languages

**Be aware that ONLY the theme translations will change (like login screen and toolbar dropdowns), the demo itself is not translated!** 

- Simple solution: This demo supports locales via URLs, use the dropdown in the pages head navigation.
- Permanent solution: Edit the file `config/services.yaml` and change from `locale: 'en'` to something like `locale: 'ar'`.

## Real world examples

If you want to see the theme in action (in a real world application), checkout my Symfony 4 based time-tracking application **Kimai 2** at:
https://github.com/kevinpapst/kimai2
