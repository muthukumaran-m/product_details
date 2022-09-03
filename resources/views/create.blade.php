@extends('app')

@section('content')
<form action="{{route('product.store')}}" method="POST" id="productform">
    @csrf
    <div class="columns">

        <div class="column is-2">
            <h2 class="is-size-3 has-text-centered">Brand Detail</h2>
            <hr>
            <div class="field">
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <input required name="brand_name" class="input" type="text" placeholder="Enter the brand name">
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="column">
            <h2 class="is-size-3 has-text-centered">

                Product details
            </h2>
            <hr>
            <div id="dynamicAddRemove">
                <div class="columns">
                    <div class="column">
                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input" type="text" readonly value="{{str_pad($nextkey,3,0,STR_PAD_LEFT)}}">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input required name="products[0][name]" class="input" type="text" placeholder="Product name">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="column">
                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input required name="products[0][price]" class="input" type="number" placeholder="Price">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input required name="products[0][quantity]" class="input" type="number" placeholder="Quantity">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="column">
                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input required name="products[0][discount]" class="input percentage" type="number" min=0 max=100 placeholder="Discount in %">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input required name="products[0][tax]" class="input percentage" type="number" min=0 max=100 placeholder="Tax in %">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="has-text-right">
                <button id="dynamic-ar" class="button is-info">Add more product</button>
            </div>
            <br>
            <div class="has-text-right">
                <button class="button is-primary" type="submit">Save</button>
            </div>
        </div>
    </div>
    <div class="has-text-left">
        <a href="{{route('product.index')}}" class="button is-link" type="submit">Back to list</a>
    </div>

</form>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
<script type="text/javascript">
    var i = 0;
    let code = "{{$nextkey}}";

    $("#dynamic-ar").click(function(elem) {
        elem.preventDefault();
        ++code;
        let trialcode = ('0000' + code).slice(-3);;
        ++i;
        $("#dynamicAddRemove").append(`
        <div class="columns more-` + i + `">
                    <div class="column">
                    <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input" type="text" readonly value="` + trialcode + `">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input required name="products[` + i + `][name]" class="input" type="text" placeholder="Product name">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="column">
                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input required name="products[` + i + `][price]" class="input" type="number" placeholder="Price">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input required name="products[` + i + `][quantity]" class="input" type="number" placeholder="Quantity">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="column">
                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input required name="products[` + i + `][discount]" class="input percentage" type="number" max=100 min=0 placeholder="Discount in %">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input required name="products[` + i + `][tax]" class="input percentage" type="number" max=100 min=0 placeholder="Tax in %">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div data-more='more-` + i + `' class="has-text-right has-text-danger is-clickable remove-input-field more-` + i + `">Remove</div>
        `);
    });
    $(document).on('click', '.remove-input-field', function() {
        // $(this).parents('.this-field').remove();
        let elem = $(this).data('more')
        console.log(elem);
        $("." + elem).remove();
    });
    $(".input").rules("add", {
        required: true,
    });
    $(".percentage").rules("add", {
        max: 100,
        min: 0
    });
    $("#productform").validate();
</script>
@endsection