<div class="page-wrapper">
    <div class="intro">
        <img src="{{ asset('img/category.jp')}}g" alt="" data-aos="zoom-in">
        <div class="letter_intro">
            <p>Trong cuộc sống của con người luôn ngược đời, người quan tâm bạn thì bạn không màng.
            Nhưng khi người lạnh lùng, ơ hờ với bạn thì bạn lại theo đuổi không dứt.
            Vậy cuối cùng, người bị tổn thương sẽ là ai?</p>
        </div>
    </div>
	<div class="page_content">
        @foreach($categories as $category)
		<div class="content">
            <div class="items">
                <img src="{{ asset('img/category.jp')}}g" alt="" data-aos="zoom-in">
                <div class="letter">
                    <a href="{{route('category', $category->slug)}}">{{$category->title}}</a>
                </div>
            </div>
		</div>
        @endforeach
	</div>
</div>

