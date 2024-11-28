**Magento 2 DotEnv** is a zero-dependency module that loads environment variables from a **.env** file into Storing configuration in the environment separate from code is based on The Twelve-Factor App methodology.

# Store Magento config in the environment
An app’s config is everything that is likely to vary between deploys (staging, production, developer environments, etc). This includes:

Resource handles to the database, Memcached, and other backing services
Credentials to external services such as Amazon S3 or Twitter
Per-deploy values such as the canonical hostname for the deploy
Apps sometimes store config as constants in the code. This is a violation of twelve-factor, which requires strict separation of config from code. Config varies substantially across deploys, code does not.

A litmus test for whether an app has all config correctly factored out of the code is whether the codebase could be made open source at any moment, without compromising any credentials.

Anything that is likely to change between deployment environments – such as database credentials or credentials for 3rd party services – should be extracted from the code into environment variables.

Basically, a .env file is an easy way to load custom configuration variables that your application needs without having to modify .htaccess files or Apache/nginx virtual hosts. This means you won't have to edit any files outside the project, and all the environment variables are always set no matter how you run your project - Apache, Nginx, CLI, and even PHP's built-in webserver. It's WAY easier than all the other ways you know of to set environment variables, and you're going to love it!

NO editing virtual hosts in Apache or Nginx
NO adding php_value flags to .htaccess files
EASY portability and sharing of required ENV values
COMPATIBLE with PHP's built-in web server and CLI runner
PHP dotenv is a PHP version of the original Ruby dotenv.

##Installation
Installation is super-easy via Composer:

```composer require mage/dotenv```
or add it by hand to your composer.json file.

## Usage
The .env file is generally kept out of version control since it can contain sensitive API keys and passwords. A separate .env.example file is created with all the required environment variables defined except for the sensitive ones, which are either user-supplied for their own development environments or are communicated elsewhere to project collaborators. The project collaborators then independently copy the .env.example file to a local .env and ensure all the settings are correct for their local environment, filling in the secret keys or providing their own values when necessary. In this usage, the .env file should be added to the project's .gitignore file so that it will never be committed by collaborators. This usage ensures that no sensitive passwords or API keys will ever be in the version control history so there is less risk of a security breach, and production values will never have to be shared with all project collaborators.

Add your application configuration to a .env file in the root of your project. Make sure the .env file is added to your .gitignore so it is not checked-in the code

```
S3_BUCKET="dotenv"
SECRET_KEY="souper_seekret_key"
```
Now create a file named .env.example and check this into the project. This should have the ENV variables you need to have set, but the values should either be blank or filled with dummy data. The idea is to let people know what variables are required, but not give them the sensitive production values.
```
S3_BUCKET="devbucket"
SECRET_KEY="abc123"
```

 https://www.youtube.com/watch?app=desktop&v=oTrJfgUF1SI&t=400s
