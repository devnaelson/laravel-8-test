export default function config(url) {
    return axios.create({
        baseURL: url,
        timeout: 1000,
        headers: { 'Accept': 'application/json', 'Authorization': 'bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5NTc1NWYzZS0xN2Q2LTQ3YTctYTg3OS02ZmEzZDI5YTA0ZjQiLCJqdGkiOiIzMjk4Zjk3NTgzMzcwZWM5YTZkMzY4Y2QwY2FlYmY3Yzk0ZTBkMDk0NzRjNDFkOTBhMGY3YmM3NzJlMmZjM2M5N2E0OTQ2ZDU4MGE2OTBmYSIsImlhdCI6MTY0MzMxMzQ5My41MDM0MjcsIm5iZiI6MTY0MzMxMzQ5My41MDM0MjksImV4cCI6MTY3NDg0OTQ5My40OTYzNDcsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.dADAF8f2cBIodG2uq2ELhvgEm8eONGBCfTQNeCeQk6LbwpNgD1kTwuQmQL1Z8S_OZQRp1dCvshzj5gZJMCWxZk7BNk9Ycv9z6TVTrcBYtNsfjRU_L4WgRORH5dKAH6Zbz5MHg3hI3Jl22WQCKb0WHAvNDvQEFhygdD5dPb_RRUMjvFelElgb6MmqqUzX6pKWgfdIb85fYgQiDyNJn-89fw1JvBu6e8cnC5CEjzXVw_pWrb93j_uj7zAiKwkWyfylarTUYXECMLyupqf2JYe57878zBsKOrqKl0cvdQlyQOHysd5wk0i33bKhgmlhuP7B2qqfWtNftCba7ETrn-2qzsX5agjnWVm-fm5s-g1Gh51iapqRQt7KqN07PiNLnRRIF-F3nl1OHq8TQy9YNc8dlY15TIsY7Fs0Fa-6wjg4DHKNgdKbkqpW7wJFhDdnVrBiC2QeoiAJGsJeB8CB4pdSxox2ORUE8LheYnxq0IXWda6hI-O9hNx-AjqBflJNWggislTHahqfXH1RaomOl-Y7JkxVB2idXnOWPNPka3XyzpVxiVX4PpWRgelwEzdvxpiU110IN4W_3Li-iUZSETehh3gJ3qqQ_bGDnkBTHnPMcfqwFrO6_L-35WczFK5E1MLkycZSP_8_KZ_IssFMX9hKbzxy11i1Sjjl5eEC6MFWx_k' }
    });
}

export default function request(nAxios, url) {
    return nAxios.get(url).then((response) => {
        return response.data;
    });
}
