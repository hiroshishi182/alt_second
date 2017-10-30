<?php
register_nav_menu('mainMenu', 'メインメニュー'); //第一引数が下記の記述場所と対応している。第二引数が管理画面の位置に表示される。
register_sidebar();
add_theme_support('post-thumbnails');

//トップの空白除去
add_filter( 'show_admin_bar', '__return_false' );

?>

<?php
add_action('init', 'register_post_type_and_taxonomy'); // // 最初にregister_post_type_and_taxonomy関数を実行
function register_post_type_and_taxonomy() {
  register_post_type( // カスタム投稿タイプを定義するための関数
    'news', // カスタム投稿タイプ名
    array(
      'labels' => array(
        'name' => 'ニュース', //ダッシュボードに表示される名前
        'add_new_item' => 'ニュースを新規追加', // 新規追加画面に表示される名前
        'edit_item' => 'ニュースの編集', // 編集画面に表示される名前
      ),
      'public' => true, // ダッシュボードに表示するか否か
      'hierarchical' => true, // 階層型にするか否か
      'has_archive' => true, // アーカイブ（一覧表示機能）を持つか否か
      'supports' => array( // カスタム投稿ページに表示される項目
        'title', // タイトル　＊＊＊カスタムフィールドだけにしたい場合は消しちゃう＊＊＊
        'editor', // 本文　＊＊＊カスタムフィールドだけにしたい場合は消しちゃう＊＊＊
        'custom-fields', // カスタムフィールド
        'thumbnail', // アイキャッチ画像　＊＊＊カスタムフィールドだけにしたい場合は消しちゃう＊＊＊
      ),
      'menu_position' => 5, // ダッシュボードで投稿の下に表示
      'rewrite' => array('with_front' => false), // パーマリンクの編集（newsの前の階層URLを消して表示）
    )
  );

/* カテゴリタクソノミー(カテゴリー分け)を使えるように設定する */
  register_taxonomy(
    'orijinal_themes_cat', /* タクソノミーの名前 */
    'orijinal_themes', /* 使用するカスタム投稿タイプ名 */
    array(
      'hierarchical' => true, /* trueだと親子関係が使用可能。falseで使用不可 */
      'update_count_callback' => '_update_post_term_count',
      'label' => 'オリジナルテーマ作成カテゴリー',
      'singular_label' => 'オリジナルテーマ作成カテゴリー',
      'public' => true,
      'show_ui' => true
    )
  );
/* カスタムタクソノミー、タグを使えるようにする */
  register_taxonomy(
    'orijinal_themes_tag', /* タクソノミーの名前 */
    'orijinal_themes', /* 使用するカスタム投稿タイプ名 */
    array(
      'hierarchical' => false,
      'update_count_callback' => '_update_post_term_count',
      'label' => 'オリジナルテーマ作成タグ',
      'singular_label' => 'オリジナルテーマ作成タグ',
      'public' => true,
      'show_ui' => true
    )
  );

}

// カスタムヘッダー画像を設置する
$custom_header_defaults = array(
        'default-image'          => get_bloginfo('template_url').'/img/logo.png',
        'width'                  => 150,
        'height'                 => 33,
        'header-text'            => false,  //ヘッダー画像上にテキストをかぶせる
);
add_theme_support( 'custom-header', $custom_header_defaults ); //カスタムヘッダー機能を有効にする


//sidebar
function arphabet_widgets_init() {

    register_sidebar( array(
        'name' => 'right sidebar',
        'id' => 'my_sidebar',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
    ) );
}


//管理画面から配色を変えられるようにする
add_action('init', 'rainbow');

function rainbow() {
    add_option('color'); // オプション追加
    add_action('admin_menu', 'option_menu_create'); // 管理メニュー追加
    function option_menu_create() {
        add_theme_page('配色', '配色', 'edit_themes', basename(__FILE__), 'option_page_create'); // 概観メニューのサブメニューとして追加
    }
    function option_page_create() { // 設定ページ生成
        $saved = save_option();
        require TEMPLATEPATH.'/admin-option.php';
    }
}
function save_option() { // オプション保存
    if (empty($_REQUEST['color'])) return;
    $save = update_option('color', $_REQUEST['color']);
    return $save;
}


//カスタムフィールド

// 固定カスタムフィールドボックス
function add_book_fields() {
  //add_meta_box(表示される入力ボックスのHTMLのID, ラベル, 表示する内容を作成する関数名, 投稿タイプ, 表示方法)
  //第4引数のpostをpageに変更すれば固定ページにオリジナルカスタムフィールドが表示されます(custom_post_typeのslugを指定することも可能)。
  //第5引数はnormalの他にsideとadvancedがあります。
  add_meta_box( 'book_setting', '本の情報', 'insert_book_fields', 'post', 'normal');
}
add_action('admin_menu', 'add_book_fields');
 



 
// カスタムフィールドの入力エリア
function insert_book_fields() {
  global $post;
 
  //下記に管理画面に表示される入力エリアを作ります。「get_post_meta()」は現在入力されている値を表示するための記述です。
  echo '題名： <input type="text" name="book_name" value="'.get_post_meta($post->ID, 'book_name', true).'" size="50" /><br>';
  echo '作者： <input type="text" name="book_author" value="'.get_post_meta($post->ID, 'book_author', true).'" size="50" /><br>';
  echo '価格： <input type="text" name="book_price" value="'.get_post_meta($post->ID, 'book_price', true).'" size="50" />　<br>';
  
  if( get_post_meta($post->ID,'book_label',true) == "is-on" ) {
    $book_label_check = "checked";
  }//チェックされていたらチェックボックスの$book_label_checkの場所にcheckedを挿入
  echo 'ベストセラーラベル： <input type="checkbox" name="book_label" value="is-on" '.$book_label_check.' ><br>';
}
 
 
// カスタムフィールドの値を保存
function save_book_fields( $post_id ) {
  if(!empty($_POST['book_name'])){ //題名が入力されている場合
    update_post_meta($post_id, 'book_name', $_POST['book_name'] ); //値を保存
  }else{ //題名未入力の場合
    delete_post_meta($post_id, 'book_name'); //値を削除
  }
  
  if(!empty($_POST['book_author'])){
    update_post_meta($post_id, 'book_author', $_POST['book_author'] );
  }else{
    delete_post_meta($post_id, 'book_author');
  }
  
  if(!empty($_POST['book_price'])){
    update_post_meta($post_id, 'book_price', $_POST['book_price'] );
  }else{
    delete_post_meta($post_id, 'book_price');
  }
  
  if(!empty($_POST['book_label'])){
    update_post_meta($post_id, 'book_label', $_POST['book_label'] );
  }else{
    delete_post_meta($post_id, 'book_label');
  }
}
add_action('save_post', 'save_book_fields');




//概要（抜粋）の文字数調整
function my_excerpt_length($length) {
  return 50;
}
add_filter('excerpt_length', 'my_excerpt_length');

//概要（抜粋）の文末変更
function my_excerpt_more($post) {
  return '<a href="'. get_permalink($post->ID) . '">' . '…' . '</a>';
}
add_filter('excerpt_more', 'my_excerpt_more');





















