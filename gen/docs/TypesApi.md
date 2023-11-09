# TypesApi

All URIs are relative to *http://localhost*

Method | HTTP request | Description
------------- | ------------- | -------------
[**apiV1TypesDelete**](TypesApi.md#apiV1TypesDelete) | **DELETE** /api/v1/types | Удалить тип сырья по значению
[**apiV1TypesGet**](TypesApi.md#apiV1TypesGet) | **GET** /api/v1/types | Получить список типов сырья
[**apiV1TypesPost**](TypesApi.md#apiV1TypesPost) | **POST** /api/v1/types | Добавить тип сырья


<a name="apiV1TypesDelete"></a>
# **apiV1TypesDelete**
> apiV1TypesDelete(type)

Удалить тип сырья по значению

### Example
```java
// Import classes:
import org.openapitools.client.ApiClient;
import org.openapitools.client.ApiException;
import org.openapitools.client.Configuration;
import org.openapitools.client.models.*;
import org.openapitools.client.api.TypesApi;

public class Example {
  public static void main(String[] args) {
    ApiClient defaultClient = Configuration.getDefaultApiClient();
    defaultClient.setBasePath("http://localhost");

    TypesApi apiInstance = new TypesApi(defaultClient);
    String type = "шрот"; // String | 
    try {
      apiInstance.apiV1TypesDelete(type);
    } catch (ApiException e) {
      System.err.println("Exception when calling TypesApi#apiV1TypesDelete");
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
 **type** | **String**|  |

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

<a name="apiV1TypesGet"></a>
# **apiV1TypesGet**
> apiV1TypesGet()

Получить список типов сырья

### Example
```java
// Import classes:
import org.openapitools.client.ApiClient;
import org.openapitools.client.ApiException;
import org.openapitools.client.Configuration;
import org.openapitools.client.models.*;
import org.openapitools.client.api.TypesApi;

public class Example {
  public static void main(String[] args) {
    ApiClient defaultClient = Configuration.getDefaultApiClient();
    defaultClient.setBasePath("http://localhost");

    TypesApi apiInstance = new TypesApi(defaultClient);
    try {
      apiInstance.apiV1TypesGet();
    } catch (ApiException e) {
      System.err.println("Exception when calling TypesApi#apiV1TypesGet");
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

<a name="apiV1TypesPost"></a>
# **apiV1TypesPost**
> apiV1TypesPost(UNKNOWN_BASE_TYPE)

Добавить тип сырья

### Example
```java
// Import classes:
import org.openapitools.client.ApiClient;
import org.openapitools.client.ApiException;
import org.openapitools.client.Configuration;
import org.openapitools.client.models.*;
import org.openapitools.client.api.TypesApi;

public class Example {
  public static void main(String[] args) {
    ApiClient defaultClient = Configuration.getDefaultApiClient();
    defaultClient.setBasePath("http://localhost");

    TypesApi apiInstance = new TypesApi(defaultClient);
    UNKNOWN_BASE_TYPE UNKNOWN_BASE_TYPE = new UNKNOWN_BASE_TYPE(); // UNKNOWN_BASE_TYPE | Данные типа сырья для добавления
    try {
      apiInstance.apiV1TypesPost(UNKNOWN_BASE_TYPE);
    } catch (ApiException e) {
      System.err.println("Exception when calling TypesApi#apiV1TypesPost");
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
 **UNKNOWN_BASE_TYPE** | [**UNKNOWN_BASE_TYPE**](UNKNOWN_BASE_TYPE.md)| Данные типа сырья для добавления |

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

