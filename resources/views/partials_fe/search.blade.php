<div class="container col-auto search_main">
    <div class="row ">
        <div class="col-xs search_main_item ">
            <div class="label">Loại tin</div>
            <select class="custom-select fixed" id="categories">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-xs search_main_item">
            <div class="label">Tỉnh thành</div>
            <select class="custom-select fixed" id="province">
                <option>Chọn tỉnh thành</option>
                @foreach($provinces as $province)
                    <option value="{{$province->id}}">{{$province->_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-xs search_main_item">
            <div class="label">Quận huyện</div>
            <select class="custom-select fixed" id="district">
                <option value="">Chọn Quận huyện</option>
            </select>
        </div>
        <div class="col-xs search_main_item">
            <div class="label">Phường xã</div>
            <select class="custom-select fixed" id="ward">
                <option value="">Chọn Phường Xã</option>
            </select>
        </div>
        <div class="col-xs search_main_item">
            <div class="label">Khoảng giá</div>
            <select class="custom-select fixed">
                <option value="">Chọn khoảng giá</option>
                <option value="1">Dưới 1 triệu</option>
                <option value="2">1 triệu - 2 triệu</option>
                <option value="3">2 triệu - 3 triệu</option>
                <option value="4">3 triệu - 5 triệu</option>
                <option value="5">5 triệu - 7 triệu</option>
                <option value="6">7 triệu - 10 triệu</option>
                <option value="7">Trên 10 triệu</option>
            </select>
        </div>
        <div class="col-xs search_main_item">
            <div class="label">Diện tích</div>
            <select class="custom-select fixed">
                <option>Chọn diện tích</option>
                <option value="1">Dưới 15 m2</option>
                <option value="2">15 m2 - 20 m2</option>
                <option value="3">20 m2 - 30 m2</option>
                <option value="4">30 m2 - 40 m2</option>
                <option value="5">Trên 40 m2</option>
            </select>
        </div>
        <div class="col-xs ">
            <div class="search_main_item">
                <div class="label"></div>
                <button class="btn btn-warning vh100">Lọc tin</button>
            </div>
        </div>
    </div>
</div>

