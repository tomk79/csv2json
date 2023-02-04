# csv2json

CSVを読み込んで、連想配列構造に変換します。
連想配列からJSONを出力できます。

## 導入 - Setup

composer.json の require 項目に、`tomk79/csv2json` を追加します。

```
{
    "require": {
        "tomk79/csv2json": "1.*"
    }
}
```
`$ composer install` で、インストールを実行します。

あとは、Composer のマニュアルを参考に、`autoload.php` を `require_once()` すれば、セットアップは完了です。


## 使い方 - Usage

```php
$csv2json = new \tomk79\csv2json( 'path/to/data.csv' );
var_dump( $csv2json->fetch_assoc() ); // 連想配列で受け取る
var_dump( $csv2json->to_json() ); // JSON形式の文字列で受け取る
```

CSVファイルの最初の行(0行目)が定義行として使用されます。


## 更新履歴 - Change log

### csv2json v1.0.1 (2023年2月5日)

- 内部コードの細かい修正。

### csv2json v1.0.0 (2015年1月28日)

- Initial Release.


## ライセンス - License

MIT License


## 作者 - Author

- (C)Tomoya Koyanagi <tomk79@gmail.com>
- website: <https://www.pxt.jp/>
- Twitter: @tomk79 <https://twitter.com/tomk79/>


## for Developer

### Test

```bash
$ ./vendor/phpunit/phpunit/phpunit
```

