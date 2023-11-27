	@extends('layouts.app')

	@section('titulo', 'Inicio')

		@section('encabezado')
			<button class="editor-toolbar-item icon">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M5 9.5C8.5 9.5 11.5 9.5 15 9.5C15.1615 9.5 19 9.5 19 13.5C19 18 15.2976 18 15 18C12 18 10 18 7 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M8.5 13C7.13317 11.6332 6.36683 10.8668 5 9.5C6.36683 8.13317 7.13317 7.36683 8.5 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
				</svg>

			</button>
			<button class="editor-toolbar-item icon">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M19 9.5C15.5 9.5 12.5 9.5 9 9.5C8.83847 9.5 5 9.5 5 13.5C5 18 8.70237 18 9 18C12 18 14 18 17 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
					<path d="M15.5 13C16.8668 11.6332 17.6332 10.8668 19 9.5C17.6332 8.13317 16.8668 7.36683 15.5 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
			</button>
			<span class="separator"></span>
			<button class="editor-toolbar-item dropdown">
				<span>Paragraph</span>
				<svg xmlns="http://www.w3.org/2000/svg" width="192" height="192" fill="#000000" viewBox="0 0 256 256">
					<rect width="256" height="256" fill="none"></rect>
					<polyline points="208 96 128 176 48 96" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></polyline>
				</svg>
			</button>
		@endsection
		@section('contenido')
					<div class="editor-textarea-editable" contenteditable spellcheck="false">
						<h1>What web designers can learn from artists - from Van Gogh to Lloyd Wright</h1>
						<p class="leading">Art in it's classic form, like painting and sculpting, is not
							that different to the creations of web and UI designers. Even though their
							purpose is different - as the goal of great web design is to enhance user
							experiences - there's still a lot to learn from the former.</p>
						<p>By now you may have been intruiged to read this article, but I'm sorry to inform
							you that this is not some 'Medium-like-inspirational-design-take-kind-of-story'.
							This is just an article full of gibberish, written in a way that makes it look
							<img src="https://assets.codepen.io/285131/painting.jpg" />like a real article, but it's not. It's sole
							purpose is to look good in this
							CodePen demo, this CMS design concept. The image has also nothing to do with the
							accompanied text, it's just a filler like everything else. You see, I feel it's
							sometimes better to use 'real' text rather than 'Lorem Ipsum'. However, this
							text is not <em>real</em>. Well, of course it's <strong>real</strong>, since
							someone has written it (me), but it's not a real blog post.
						</p>
						<p>For designers it's important, or even necessary to, use real data instead of
							'Lorem ipsum'. Sure, the latin excerpt is popular, but the problem is that you
							don't understand what it says there. This is not just a problem for articles,
							but for UI in general. How do you think the site structure on the left would
							look like if I replaced 'Product' and 'Pricing' with 'Lorem Ipsum' and 'Dolor
							Sit'? Doesn't give you the right impression, does it? And I know what you're
							thinking: 'Product' and 'Pricing' isn't real data either, it's just made up
							names of pages. That's true - but it's still better than the alternative. Also,
							after all, this is just a pen, and this design is just a concept. But it looks
							legit, right?</p>
						<h2>Why 'Form Follows Function' is a valid rule to live by in web design</h2>
						<p>Use text that your client provides. Give your UI good labels, labels that are actually going to be used in production. There's several reasons as to why it's better to use real data instead of 'Lorem Ipsum':
						</p>

						<ul>
							<li>It's more readable (obviously)</li>
							<li>You stress test your designs, meaning that you'll become more aware of errors caused by line-breaks and text overflow.</li>
							<li>It's more fun and rewarding, since you've designed something that looks <em>real</em></li>
						</ul>
						<p>
							Don't read to much into this, though. This article was never meant to convince you to stop using 'Lorem Ipsum', this is in fact just an article full of gibberish.</p>

						<h2>More filler content</h2>
						<p>I could've easily written about how you make potato salad without potatoes, or written a fairytale about potato salad princes and potato salad princesses, instead.
						</p>

						<p>I did not. At least I saved the potato salad part of this article to a section further down, so far down that you'll perhaps have to scroll to read it (depending on your screen size), hopefully saving you from thinking "Why does he mention potato salad in an article about web design?" before you've taken a look at the CMS design concept. Which again is the whole purpose of this pen.</p>
						<p>If you liked this pen I suggest you should check out <a href="https://codepen.io/havardob" contenteditable="false" target="_blank">some of my other pens</a>.</p>
					</div>
		@endsection

