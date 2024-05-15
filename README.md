# WooCommerce APIWA AUTO

## Getting Started
To get up and running within the WooCommerce APIWA AUTO, you will need to make sure that you have installed all of the prerequisites.

Read about this premium plugin.
https://tochat.be/click-to-chat/2024/05/13/plugin-for-woocommerce-wordpress-for-notifications-with-whatsapp/

### Prerequisites
- [Node.js](https://nodejs.org/en/)
- [PNPM](https://pnpm.io/)
- [Composer](https://getcomposer.org/)

Once you've installed all of the prerequisites, you can run the following commands to get everything working.

```bash
# Install the dependencies
$ pnpm install
$ composer install

# Start the development server
$ pnpm run build:dev
```

### Build installable zip file

```bash
$ pnpm run build
```

The installable zip file will be located in the `build` directory with the name `woocommerce-apiwa-auto.zip`.
