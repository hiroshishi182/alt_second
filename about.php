<?php
/*
Template Name: About
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>

<div id="container">
	<article>
		<div id="inner">
			<div id="page-title">
				<h2>About</h2>
			</div>
			<section>
				<div class="page-contents" id="about-first">
					<div id="about-logo-wrapper">
						<svg id="about-mark"><use xlink:href="#mark"></use>
						</svg><svg id="about-logo"><use xlink:href="#logo"></use></svg>
					</div>
					<h1>Alternative Design（オルタナティブ デザイン）には「オリジナル性と普遍的なデザインの追求」の意味を込めました。</h1>
					<p>起源はAlternative Music（オルタナティブ ミュージック）です。<br>音楽シーンの1つで、「型にはまらず、オリジナル性が高く、普遍的な音楽を追求している音楽やアーティスト」を指す言葉として解釈しています。<br>また、オルタナティヴ（Alternative）は「もうひとつの選択、代わりとなる、異質な、型にはまらない」という意味の英語の形容詞です。</p>
				</div>
				<div class="page-contents" id="about-second">
					<h2>Design Genre</h2>
					<ul>
						<li>
							<h3>Web</h3>
						</li>
						<svg><use xlink:href="#slash"></use></svg>
						<li>
							<h3>Graphic</h3>
						</li>
						<svg><use xlink:href="#slash"></use></svg>
						<li><h3>etc…</h3></li>
					</ul>
					<p>メインはWeb、グラフィックですが、デザインのジャンルは問いません。<br>少しでもデザインに関わりがありそうなことであればご協力できることがあるはずです。</p>
				</div>
				<div class="page-contents" id="about-third">
					<h2>Introduce Myself</h2>
					<h3>山口裕志<span>Yamaguchi Hiroshi</span></h3>
					<p>愛知県豊川市のフリーランスです。<br>新しいことを始めたい、デザインに関わりがありそうだ、オルタナティブデザインに共感できそうだ、漠然といいかもと感じて頂ける方は取り敢えず、お話を聞かせてください。共に面白いことを探し、実現したいと考えます。</p>
				</div>
			</section>
		</div>
	</article>
	<div id="pageTop">
		<a href="#"><svg><use xlink:href="#page-top"></use></svg><p>トップへ戻る</p></a>
	</div>
</div>

<!-- サイドバー -->
<div id="sidebar">
<ul>
<?php //dynamic_sidebar(); ?>
</ul>
</div><!-- /サイドバー -->

<?php get_footer(); ?>