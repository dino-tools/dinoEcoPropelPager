
# NAME

dinoEcoPropelPager

# WHAT IS THIS?

dinoEcoPropelPager
軽い場合もあるかも、なページャ。

Symfony1.0用

# INSTALL

あなたのプロジェクトのlibディレクトリにコピーして下さい。

# DESCRIPTION

**概要**

SELECT * は重いので、SELECT id にかえるためのページャーです。
そのテーブルの１レコードあたりのデータ量（カラム数が多いなど）の場合には効果があります。

**使い方**

通常のPropelPagerを使っているコードがあれば、これに差し替えてください。

**コンストラクタ**

引数

1. sfPropelPagerの第1引数と同じ
2. PK名
3. クラス名
4. sfPropelPagerの第2引数と同じ

**TODO**

* PKは自動で判定できるのでは…

# EXAMPLE

    $pager = new dinoEcoPropelPager('Customer', 'id', 'Customer', 30);
    $items = $pager->getResults();

# CHANGELOG

* 2011/01/13 初版

# AUTHOR

* ryer
