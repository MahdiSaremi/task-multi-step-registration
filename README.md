# Multi Step Registration (TASK)

این تسک شامل دو پروژه می باشد. پروژه اول این پروژه می باشد که سایت اصلی ست
و یک پروژه پروژه زیر است که سرور واسط می باشد و وظیفه نگهداری اطلاعات کاربر
و فایل ها را به عهده دارد.

https://github.com/MahdiSaremi/task-multi-step-registration-test-api

## نصب

1. این پروژه و [این پروژه](https://github.com/MahdiSaremi/task-multi-step-registration-test-api) را دانلود کنید
2. برای این پروژه دستور های زیر را بزنید:
```shell
php artisan migrate
```
3. برای پروژه دوم این دستور ها را بزنید:
```shell
php artisan migrate
php artisan db:seed
```

## استفاده

پروژه اول را این گونه روشن کنید:

```shell
php artisan serve
npm run dev
```

پروژه دوم، سرور واسط است که اگر می خواهید حالت روشن آن را تست کنید، حتما با
این دستور آن را روشن کنید:
```shell
php artisan serve --port=8001
```


## توضیحات

### مراحل
مراحل به ترتیب زیر می باشد:

`PersonalInfoState` - `PhoneState` - `PhoneConfirmState` -
`AvatarState` - `SubmitState`
