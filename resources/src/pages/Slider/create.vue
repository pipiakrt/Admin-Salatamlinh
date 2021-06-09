<template>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <Breadcrumb :data="subHeader" />
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom gutter-b example example-compact">
                <div class="card-header">
                    <h3 class="card-title">Thêm thanh trượt</h3>
                    <div class="card-toolbar">
                        <div class="example-tools justify-content-center">
                            <span class="example-toggle" data-toggle="tooltip" title="" data-original-title="View code"></span>
                            <span class="example-copy" data-toggle="tooltip" title="" data-original-title="Copy code"></span>
                        </div>
                    </div>
                </div>
                <form>
                    <div class="card-body">
                        <div class="form-group mb-8">
                            <div class="alert alert-custom alert-default" role="alert">
                                <div class="alert-icon">
                                    <i class="ki ki-outline-info icon-2x text-primary"></i>
                                </div>
                                <div class="alert-text">Here are examples of <code>.form-control</code>applied to each textual HTML5 input type:</div>
                            </div>
                        </div>
                        <div v-if="!preview" class="form-group row mt-10">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Uploads tệp tin</label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <div data-toggle="modal" @click="modal = true" data-target="#filemanager" class="dropzone dropzone-default dropzone-primary">
                                    <div class="dropzone-msg dz-message needsclick">
                                        <h3 class="dropzone-msg-title">Kéo Thả tệp tin của bạn vào đây.</h3>
                                        <span class="dropzone-msg-desc">Hoặc nhấp vào để tải lên!</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else class="form-group row mt-10">
                            <div class="col-md-12 text-center">
                                <div class="position-relative">                                
                                    <img class="mw-100" :src="preview">
                                    <label @click="preview = ''" class="position-absolute right-0 btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="card-footer">
                            <button type="reset" @click="submit()" class="btn btn-primary mr-2">Thêm Mới</button>
                            <router-link to="/thanh-truot/danh-sach" class="btn btn-secondary">Đóng</router-link>
                        </div>
                </form>
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
</div>
</template>

<script>
import Extends from '../../extend';
import Breadcrumb from '../../components/breadcrumb/index'
import FileManage from '../../components/FileManager/index'
export default {
    components: {
        Breadcrumb,
        FileManage
    },
    data() {
        return {
            subHeader: {
                links: [{
                        name: 'Thanh trượt',
                        url: '/thanh-truot/danh-sach',
                    },
                    {
                        name: 'Thêm mới',
                        url: '/thanh-truot/them-moi',
                    },
                ],
                action: {
                    url: '/thanh-truot/danh-sach',
                    icon: 'icon-sm ki ki-long-arrow-back',
                    text: 'Danh sách',
                },
            },
            modal: false,
            preview: ''
        }
    },
    methods: {
        setUrl(path) {
            $('#filemanager').modal('hide');
            this.preview = path
        },
        submit() {
            if (this.preview) {
                Extends.LoadPage()
                let params = {
                    path: this.preview
                }
                axios.post('/api/sliders', params).then((res) => {
                    KTApp.unblockPage();
                    this.$router.push('/thanh-truot/danh-sach')
                })
            }
            else {
                Swal.fire({
                title: 'Chưa chọn ảnh',
                showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                });
            }
        }
    },
}
</script>
