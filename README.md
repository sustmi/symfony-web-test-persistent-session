Install:
```
composer install
npm install
npm run dev
```

Run tests:
```
php bin/phpunit
```

All test should pass but those that use controller with `FlashBagInterface` in dependencies fail because flash message gets lost.