<!-- 選手情報詳細ページのコンポーネント -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <!-- 名前 -->
                    <div class="row">
                        <label for="name" class="col-6 col-form-label text-left text-md-center">{{ __('Name')}}</label>
                        <div class="col-6">
                            <p>{{ $athleteUser->name }}</p>
                        </div>
                    </div>

                    <!-- 名前 -->
                    <div class="row">
                        <label for="name" class="col-6 col-form-label text-left text-md-center">{{ __('Name')}}</label>
                        <div class="col-6">
                            <p>{{ $athleteUser->name }}</p>
                        </div>
                    </div>

                    <!-- 名前 -->
                    <div class="row">
                        <label for="name" class="col-6 col-form-label text-left text-md-center">{{ __('Name')}}</label>
                        <div class="col-6">
                            <p>{{ $athleteUser->name }}</p>
                        </div>
                    </div>

                    <!-- 名前 -->
                    <div class="row">
                        <label for="name" class="col-6 col-form-label text-left text-md-center">{{ __('Name')}}</label>
                        <div class="col-6">
                            <p>{{ $athleteUser->name }}</p>
                        </div>
                    </div>

                    <!-- 所属 -->
                    <div class="row">
                        <label for="affiliation" class="col-6 col-form-label text-left text-md-center">{{ __('Affiliation')}}</label>
                        <div class="col-6">
                            <p>{{ $athleteUser->affiliation }}</p>
                        </div>
                    </div>

                    <!-- 競技・種目・階級 -->
                    <div class="row">
                        <label for="event" class="col-6 col-form-label text-left text-md-center">{{ __('Event')}}</label>
                        <div class="col-6">
                            <p>{{ $athleteUser->event }}</p>
                        </div>
                    </div>

                    <!-- 性別 -->
                    <div class="row">
                        <label for="sex" class="col-6 col-form-label text-left text-md-center">{{ __('Sex')}}</label>
                        <div class="col-6">
                            <p>{{ $athleteUser->sex }}</p>
                        </div>
                    </div>

                    <!-- 年齢 -->
                    <div class="row">
                        <label for="age" class="col-6 col-form-label text-left text-md-center">{{ __('Age')}}</label>
                        <div class="col-6">
                            <p>{{ $athleteUser->age }}</p>
                        </div>
                    </div>

                    <!-- 身長 -->
                    <div class="row">
                        <label for="tall" class="col-6 col-form-label text-left text-md-center">{{ __('Tall')}}</label>
                        <div class="col-6">
                            <p>{{ $athleteUser->tall }}</p>
                        </div>
                    </div>

                    <!-- 体重 -->
                    <div class="row">
                        <label for="weight" class="col-6 col-form-label text-left text-md-center">{{ __('Weight')}}</label>
                        <div class="col-6">
                            <p>{{ $athleteUser->weight }}</p>
                        </div>
                    </div>

                    <!-- 編集ボタン -->
                    <div class="row c-submit__style">
                        <div class="col-6 offset-md-4">
                            <a href="{{ route('athleteUsers.edit', $athleteUser->id )}}">{{ __('Edit') }}</a>
                        </div>
                        <div class="col-md-6 offset-md-4">
                            <button type="button" class="btn c-form__btn" onClick="history.back()">{{ __('Back')}}</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
