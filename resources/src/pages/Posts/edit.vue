<template>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <Breadcrumb :data="subHeader" />
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class='col-md-12'>
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title text-capitalize" v-text="'Bài Viết: ' +name"></h3>
                        </div>
                        <form ref="FormPost">
                            <ValidationObserver ref="errors">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="name" class="col-2 col-form-label">Tên</label>
                                        <div class="col-10">
                                            <validation-provider rules="required|length:0,255" v-slot="{ errors }">
                                                <input v-model="name" class="form-control" type="text" placeholder="Tên bài viết" />
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="slug" class="col-2 col-form-label">URL</label>
                                        <div class="col-10">
                                            <validation-provider rules="required|length:0,255" v-slot="{ errors }">
                                                <input v-model="slug" class="form-control" type="search" placeholder="Đường dấn" />
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="categories" class="col-2 col-form-label">Danh mục</label>
                                        <div class="col-10">
                                            <validation-provider rules="required" v-slot="{ errors }">
                                                <select v-model="category" class="form-control">
                                                    <template v-for="item in categories">
                                                        <option :key="item.id" v-if="item.parent_id == 0" :value="item.id" v-text="item.name"></option>
                                                    </template>
                                                </select>
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="avatar" class="col-2 col-form-label">Ảnh bài viết</label>
                                        <div class="col-10">
                                            <validation-provider rules="required|length:0,255" v-slot="{ errors }">
                                                <div class="image-input image-input-outline" id="kt_image_4" style="background-position: center; background-image: url(/img/blank.png);">
                                                    <div class="image-input-wrapper bg-center" :style="preview ? { 'background-image': 'url(' + preview + ')' } : ''"></div>
                                                    <label @click="setTypeGetImg(), modal = true" data-toggle="modal" data-target="#filemanager" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change">
                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                    </label>
                                                    <input v-model="preview" type="text" hidden>
                                                    <span v-if="preview" @click="preview = ''" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove">
                                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                    </span>
                                                </div>
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="description" class="col-2 col-form-label">Mô tả</label>
                                        <div class="col-10">
                                            <validation-provider rules="required|length:0,65535" v-slot="{ errors }">
                                                <textarea v-model="description" class="form-control" placeholder="Mô tả" rows="9" id="description"></textarea>
                                                <div v-if="errors[0]" class="invalid-feedback d-block" v-text="errors[0]"></div>
                                            </validation-provider>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kt_summernote_1" class="col-2 col-form-label">Nội dung</label>
                                        <div class="col-10">
                                            <div class="summernote" id="kt_summernote_1"></div>
                                            <div v-if="errorContent" class="invalid-feedback d-block">Không được để trống</div>
                                        </div>
                                    </div>
                                </div>
                            </ValidationObserver>
                        </form>
                        <div class="card-footer text-center">
                            <router-link to="/bai-viet/danh-sach" type="reset" class="btn btn-light-primary mr-1 font-weight-bolder"><i class="icon-sm ki ki-long-arrow-back"></i> Quay Lại</router-link>
                            <button type="reset" @click="submit(1)" class="btn btn-primary mr-1"><i class="icon-sm ki ki-bold-check-1"></i> Lưu Bài Viết</button>
                            <button type="reset" @click="submit(0)" class="btn btn-primary mr-1"><i class="icon-sm ki ki-info"></i> Lưu Ẩn</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-if="modal" class="modal fade" id="filemanager">
        <div class="modal-dialog modal-full min-vh-100">
            <div class="modal-content min-vh-100">
                <div class="modal-body">
                    <FileManage :getUrl="true" @url="setUrl($event)"/>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
import Extends from '../../extend';
import Breadcrumb from '../../components/breadcrumb/index'
import FileManage from '../../components/FileManager/index'
import { ValidationObserver, ValidationProvider, extend } from 'vee-validate';
import { required } from 'vee-validate/dist/rules';
// // toastr.options = { "progressBar": true, "positionClass": "toast-top-right" };
extend('required', {
    ...required,
    message: 'Không được để trống'
});
extend('length', {
    validate(value, { min, max }) {
        return value.length >= min && value.length <= max;
    },
    params: ['min', 'max'],
    message: 'Độ dài không hợp lệ'
});
var typeimage = 'avatar';
export default {
    components: { FileManage, Breadcrumb, ValidationProvider, ValidationObserver },
    data() {
        return {
            subHeader: {
                links: [
                    {
                        name: 'Bài viết',
                        url: '/bai-viet/danh-sach',
                    },
                    {
                        name: 'Thêm mới',
                        url: '/bai-viet/them-moi',
                    },
                ],
                action: {
                    url: '/bai-viet/danh-sach',
                    icon: 'icon-sm ki ki-long-arrow-back',
                    text: 'Danh Sách',
                }
            },
            modal: false,
            name: '',
            file: '',
            preview: '',
            slug: '',
            description: '',
            categories: [],
            category: '',
            content: '',
            errorContent: false,
            post: {}
        }
    },
    watch: {
        name() {
            this.slug = Extends.ChangeToSlug(this.name)
        },
    },
    async created() {
        Extends.LoadPage()
        await axios('/api/categories').then(res => {
            this.categories = res.data.data
        })
        await axios('/api/posts/' + this.$route.params.id).then(res => {
            this.post = res.data.data
            this.name = this.post.name
            this.slug = this.post.slug
            this.preview = this.post.url
            this.description = this.post.description
            this.category = this.post.category_id
            var HelloButton = function (context) {
                var ui = $.summernote.ui;
                var button = ui.button({
                    contents: '<i class="fa far fa-folder"/>',
                    tooltip: 'Folder',
                    click: function () {
                        typeimage = 'summernote';
                        $('#filemanager').modal('show');
                    }
                });
                return button.render(); 
            }
            $('.summernote').summernote({
                height: 350,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['mybutton', ['hello']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                buttons: {
                    hello: HelloButton
                },
                callbacks: {
                    onImageUpload: function(files) {
                        let formdata = new FormData();
                        formdata.append("file", files[0]);
                        formdata.append("summernote", true);
                        axios.post('/api/images', formdata).then(res => {
                            var image = $('<img>').attr('src', res.data);
                            $('.summernote').summernote("insertNode", image[0]);
                        })
                    },
                },
            });
            $('.summernote').summernote("code", this.post.content);
            KTApp.unblockPage();
        })
    },
    methods: {
        setTypeGetImg() {
            typeimage = 'avatar'
        },
        setUrl(path) {
            $('#filemanager').modal('hide');
            if (typeimage == 'summernote') {
                var image = $('<img>').attr('src', path);
                $('.summernote').summernote("insertNode", image[0]);
            }
            else {
                this.preview = path
            }
        },
        async submit(status) {
            if (await this.errors() && await this.checkFromExtend()) {
                let params = {
                    name: this.name,
                    slug: this.slug,
                    category_id: this.category,
                    image: this.preview,
                    description: this.description,
                    content: this.content,
                    status: String(status),
                }
                KTApp.blockPage({
                    overlayColor: "#000000",
                    state: "primary",
                    message: "Đợi Xíu...",
                })
                axios.put('/api/posts/' + this.post.id, params).then((res) => {
                    KTApp.unblockPage();
                    if (res.status == 200) {
                        toastr.success("Tạo Bài viết thành công!")
                        this.$router.push('/bai-viet/danh-sach');
                    }
                    else if (res.status == 202) {
                        if (res.data.name) {
                            toastr.warning(res.data.name);
                        }
                        if (res.data.slug) {
                            toastr.warning(res.data.slug);
                        }
                    }
                    else {
                        Swal.fire("Rất Tiếc!", "Đã có sự cố đã sảy ra, vui lòng thử lại sau!", "error");
                    }
                })
            }
            else {
                this.$smoothScroll({
                    scrollTo: this.$refs.FormPost,
                    duration: 600,
                    offset: -50,
                })
            }
        },
        async checkFromExtend() {
            let check = 0;
            let content = $('.summernote').summernote('isEmpty') ? '' : $(".summernote").summernote('code');
            if (content) {
                this.content = content;
                this.errorContent = false;
            }
            else {
                check++
                this.errorContent = true;
            }
            if (check == 0) {
                return true
            }
            else {
                return false
            }
        },
        async errors() {
            this.checkFromExtend()
            return await this.$refs['errors'].validate();
        },
    },
}
</script>
<style>
.select2-dropdown {
    z-index: 10 !important;
}
.bg-center {
    background: center;
}
</style>