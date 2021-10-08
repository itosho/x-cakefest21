# x-cakefest21
Code examples for my presentation "Components Reconsidered" at [CakeFest2021](https://cakefest.org/).

[![CI](https://github.com/itosho/x-cakefest21/actions/workflows/ci.yml/badge.svg)](https://github.com/itosho/x-cakefest21/actions/workflows/ci.yml)

## My Presentation
- https://speakerdeck.com/itosho/components-reconsidered

## Setup

```bash
$ git clone git@github.com:itosho/x-cakefest21.git
$ cd x-cakefest21
$ docker-compose up -d
```

Access to http://localhost:8099

## Code examples
- [Articles Controller](https://github.com/itosho/x-cakefest21/blob/main/app/src/Controller/ArticlesController.php)
- [Goods Controller](https://github.com/itosho/x-cakefest21/blob/main/app/src/Controller/GoodsController.php)
- [Math Component](https://github.com/itosho/x-cakefest21/blob/main/app/src/Controller/Component/MathComponent.php)
- [Article Api Component](https://github.com/itosho/x-cakefest21/blob/main/app/src/Controller/Component/ArticleApiComponent.php)
- [Math Trait](https://github.com/itosho/x-cakefest21/blob/main/app/src/Controller/MathTrait.php)
- [Qiita Api Client](https://github.com/itosho/x-cakefest21/blob/main/app/src/Http/QiitaApiClient.php)
- [Article Api Interface](https://github.com/itosho/x-cakefest21/blob/main/app/src/Http/ArticleApiInterface.php)
- [Application Class](https://github.com/itosho/x-cakefest21/blob/main/app/src/Application.php)

### Testing
- [Article Controller](https://github.com/itosho/x-cakefest21/blob/main/app/tests/TestCase/Controller/ArticlesControllerTest.php)
- [Goods Controller](https://github.com/itosho/x-cakefest21/blob/main/app/tests/TestCase/Controller/GoodsControllerTest.php)
- [Math Component](https://github.com/itosho/x-cakefest21/blob/main/app/tests/TestCase/Controller/Component/MathComponentTest.php)
- [Article Api Component](https://github.com/itosho/x-cakefest21/blob/main/app/tests/TestCase/Controller/Component/ArticleApiComponentTest.php)
- [Math Trait](https://github.com/itosho/x-cakefest21/blob/main/app/tests/TestCase/Controller/MathTraitTest.php)
- [Qiita Api Client](https://github.com/itosho/x-cakefest21/blob/main/app/tests/TestCase/Http/QiitaApiClientTest.php)

