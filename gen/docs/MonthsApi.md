# MonthsApi

All URIs are relative to *http://localhost*

Method | HTTP request | Description
------------- | ------------- | -------------
[**apiV1MonthsDelete**](MonthsApi.md#apiV1MonthsDelete) | **DELETE** /api/v1/months | Удалить месяц по имени
[**apiV1MonthsGet**](MonthsApi.md#apiV1MonthsGet) | **GET** /api/v1/months | Получить список месяцев
[**apiV1MonthsPost**](MonthsApi.md#apiV1MonthsPost) | **POST** /api/v1/months | Добавить месяц


<a name="apiV1MonthsDelete"></a>
# **apiV1MonthsDelete**
> apiV1MonthsDelete(month)

Удалить месяц по имени

### Example
```java
// Import classes:
import org.openapitools.client.ApiClient;
import org.openapitools.client.ApiException;
import org.openapitools.client.Configuration;
import org.openapitools.client.models.*;
import org.openapitools.client.api.MonthsApi;

public class Example {
  public static void main(String[] args) {
    ApiClient defaultClient = Configuration.getDefaultApiClient();
    defaultClient.setBasePath("http://localhost");

    MonthsApi apiInstance = new MonthsApi(defaultClient);
    String month = "январь"; // String | 
    try {
      apiInstance.apiV1MonthsDelete(month);
    } catch (ApiException e) {
      System.err.println("Exception when calling MonthsApi#apiV1MonthsDelete");
      System.err.println("Status code: " + e.getCode());
      System.err.println("Reason: " + e.getResponseBody());
      System.err.println("Response headers: " + e.getResponseHeaders());
      e.printStackTrace();
    }
  }
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **month** | **String**|  |

### Return type

null (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

### HTTP response details
| Status code | Description | Response headers |
|-------------|-------------|------------------|
**200** | успешное удаление |  -  |
**401** | не авторизован |  -  |

<a name="apiV1MonthsGet"></a>
# **apiV1MonthsGet**
> apiV1MonthsGet()

Получить список месяцев

### Example
```java
// Import classes:
import org.openapitools.client.ApiClient;
import org.openapitools.client.ApiException;
import org.openapitools.client.Configuration;
import org.openapitools.client.models.*;
import org.openapitools.client.api.MonthsApi;

public class Example {
  public static void main(String[] args) {
    ApiClient defaultClient = Configuration.getDefaultApiClient();
    defaultClient.setBasePath("http://localhost");

    MonthsApi apiInstance = new MonthsApi(defaultClient);
    try {
      apiInstance.apiV1MonthsGet();
    } catch (ApiException e) {
      System.err.println("Exception when calling MonthsApi#apiV1MonthsGet");
      System.err.println("Status code: " + e.getCode());
      System.err.println("Reason: " + e.getResponseBody());
      System.err.println("Response headers: " + e.getResponseHeaders());
      e.printStackTrace();
    }
  }
}
```

### Parameters
This endpoint does not need any parameter.

### Return type

null (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

### HTTP response details
| Status code | Description | Response headers |
|-------------|-------------|------------------|
**200** | Успешный ответ |  -  |
**401** | не авторизован |  -  |

<a name="apiV1MonthsPost"></a>
# **apiV1MonthsPost**
> apiV1MonthsPost(UNKNOWN_BASE_TYPE)

Добавить месяц

### Example
```java
// Import classes:
import org.openapitools.client.ApiClient;
import org.openapitools.client.ApiException;
import org.openapitools.client.Configuration;
import org.openapitools.client.models.*;
import org.openapitools.client.api.MonthsApi;

public class Example {
  public static void main(String[] args) {
    ApiClient defaultClient = Configuration.getDefaultApiClient();
    defaultClient.setBasePath("http://localhost");

    MonthsApi apiInstance = new MonthsApi(defaultClient);
    UNKNOWN_BASE_TYPE UNKNOWN_BASE_TYPE = new UNKNOWN_BASE_TYPE(); // UNKNOWN_BASE_TYPE | Данные месяца для добавления
    try {
      apiInstance.apiV1MonthsPost(UNKNOWN_BASE_TYPE);
    } catch (ApiException e) {
      System.err.println("Exception when calling MonthsApi#apiV1MonthsPost");
      System.err.println("Status code: " + e.getCode());
      System.err.println("Reason: " + e.getResponseBody());
      System.err.println("Response headers: " + e.getResponseHeaders());
      e.printStackTrace();
    }
  }
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **UNKNOWN_BASE_TYPE** | [**UNKNOWN_BASE_TYPE**](UNKNOWN_BASE_TYPE.md)| Данные месяца для добавления |

### Return type

null (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: Not defined

### HTTP response details
| Status code | Description | Response headers |
|-------------|-------------|------------------|
**200** | успешное добавление |  -  |
**401** | не авторизован |  -  |

