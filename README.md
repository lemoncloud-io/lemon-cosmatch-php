# lemon-cosmatch-php
PHP Client to invoke lemon-cosmatch-api API


## 설치

AWS API 호출을 위해서는 SignatureV4를 통해서 호출해야는데, 이때 sdk를 이용하는게 편리함.

### AWS SDK PHP.

먼저 [aws-sdk-php](https://github.com/aws/aws-sdk-php)를 설치한다.

자세한 내용은 [설치 안내](https://docs.aws.amazon.com/aws-sdk-php/v3/guide/getting-started/installation.html)를 참고.

```bash
# composer 설치
$ curl -sS https://getcomposer.org/installer | php

# composer를 통한 sdk설치
$ php composer.phar require aws/aws-sdk-php
```

!또는 zip 파일을 다운로드해서 이용 가능하니 참고. [installing-via-zip](https://docs.aws.amazon.com/aws-sdk-php/v3/guide/getting-started/installation.html#installing-via-zip)


### 인증키 설정.

실행시 필요한, AWS 인증키(access_key/secret_key)는 실행 환경 변수를 통해 설정한다.

Mac/Linux

```bash
$ export ACCESS_KEY=AKIAJ4GJA3CJNAVCJ4RQ
$ export SECRET_KEY=<get key from request>
```

Windows 

```bash
$ set ACCESS_KEY=AKIAJ4GJA3CJNAVCJ4RQ
$ set SECRET_KEY=<get key from request>
```

------------------------------------------------------------------------------------

## 샘플 실행하기

인증키를 환경변수에 설정한 다음에, 콘솔에서 다음의 명령어로 실행가능함.

```bash
# run sample.
$ php sample/call-api-get.php

# 결과 값이 json형태로 되어있으며, json_decode()통해서 이후 처리 가능.
```


------------------------------------------------------------------------------------

# API 정보

lemon-cosmatch-api 를 통해서 서비스하는 API의 내용.

## `/ingredient` API

첨가물 정보 관리


## `/good` API

화장품 상품 정보 관리


