<template>
<div class="d-flex flex-column flex-root h-100">
    <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
        <div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #F2C98A;">
            <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                <a href="#" class="text-center mb-10">
                    <img src="/img/logo-letter-1.png" class="max-h-70px" alt="" />
                </a>
                <h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #986923;">Discover Amazing Metronic
                    <br />with great build tools</h3>
            </div>
            <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url(/img/login-visual-1.svg)"></div>
        </div>
        <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
            <div class="d-flex flex-column-fluid flex-center">
                <div class="login-form login-signin">
                    <ValidationObserver ref="errors">
                        <div class="pb-13 pt-lg-0 pt-5">
                            <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Welcome to Salagroup</h3>
                            <span class="text-muted font-weight-bold font-size-h4">Đăng nhập?
                                <a href="javascript:;" id="kt_login_signup" class="text-primary font-weight-bolder"> Tạo tài khoản</a></span>
                        </div>
                        <div class="form-group">
                            <label class="font-size-h6 font-weight-bolder text-dark">Tài khoản</label>
                            <validation-provider rules="required|length:0,255" v-slot="{ errors }">
                                <input v-model="email" :class="errors[0] ? 'form-control form-control-solid h-auto py-6 px-6 rounded-lg is-invalid' : 'form-control form-control-solid h-auto py-6 px-6 rounded-lg'" type="email" />
                                <span v-if="errors[0]" class="invalid-feedback" role="alert">
                                    <strong v-text="errors[0]"> ads d</strong>
                                </span>
                            </validation-provider>
                        </div>

                        <div class="form-group">
                            <div class="d-flex justify-content-between mt-n5">
                                <label class="font-size-h6 font-weight-bolder text-dark pt-5">Mật khẩu</label>
                                <a href="javascript:;" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" id="kt_login_forgot">Quên mật khẩu ?</a>
                            </div>
                            <validation-provider rules="required|length:0,255" v-slot="{ errors }">
                                <input v-model="password" :class="errors[0] ? 'form-control form-control-solid h-auto py-6 px-6 rounded-lg is-invalid' : 'form-control form-control-solid h-auto py-6 px-6 rounded-lg'" type="password" />
                                <span v-if="errors[0]" class="invalid-feedback" role="alert">
                                    <strong v-text="errors[0]"> ads d</strong>
                                </span>
                            </validation-provider>
                        </div>
                        <div class="pb-lg-0 pb-5">
                            <button @click="login()" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-1">Đăng nhập</button>
                        </div>
                    </ValidationObserver>
                </div>
            </div>
            <div class="d-flex justify-content-lg-start justify-content-center align-items-end py-7 py-lg-0">
                <div class="text-dark-50 font-size-lg font-weight-bolder mr-10">
                    <span class="mr-1">2021©</span>
                    <a href="#" target="_blank" class="text-dark-75 text-hover-primary">Keenthemes</a>
                </div>
                <a href="#" class="text-primary font-weight-bolder font-size-lg">Terms</a>
                <a href="#" class="text-primary ml-5 font-weight-bolder font-size-lg">Plans</a>
                <a href="#" class="text-primary ml-5 font-weight-bolder font-size-lg">Contact Us</a>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Extends from '../../extend';
import { ValidationObserver, ValidationProvider } from 'vee-validate';
export default {
    data() {
        return {
            email: '',
            password: '',
        };
    },
    components: {
        ValidationObserver,
        ValidationProvider,
    },
    methods: {
        async login() {
            if (await this.errors()) {
                let data = {
                    email: this.email,
                    password: this.password
                };
                axios('/api/auth', { params: data }).then(res => {
                    if (res.status == 200) {
                        Extends.SetToken(res.data.access_token)
                        this.setUpToken(res.data.access_token);
                        this.$emit("Auth", true);
                    }
                    if (res.status == 202) {
                        Swal.fire("Chưa được xác thực!", "Thông tin tài khoản chưa đúng!", "warning");
                    }
                });
            }
        },
        async errors() {
            return await this.$refs['errors'].validate();
        },
        setUpToken(token) 
        {
            axios.defaults.headers.common = {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + token
            };
        }
    }
}
</script>
