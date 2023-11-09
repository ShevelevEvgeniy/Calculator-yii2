# TonnagesApi

All URIs are relative to *http://localhost*

Method | HTTP request | Description
------------- | ------------- | -------------
[**apiV1TonnagesDelete**](TonnagesApi.md#apiV1TonnagesDelete) | **DELETE** /api/v1/tonnages | Удалить тоннаж по значению
[**apiV1TonnagesGet**](TonnagesApi.md#apiV1TonnagesGet) | **GET** /api/v1/tonnages | Получить список тоннажей
[**apiV1TonnagesPost**](TonnagesApi.md#apiV1TonnagesPost) | **POST** /api/v1/tonnages | Добавить тоннаж


<a name="apiV1TonnagesDelete"></a>
# **apiV1TonnagesDelete**
> apiV1TonnagesDelete(tonnage)

Удалить тоннаж по значению

### Example
```java
// Import classes:
import org.openapitools.client.ApiClient;
import org.openapitools.client.ApiException;
import org.openapitools.client.Configuration;
import org.openapitools.client.models.*;
import org.openapitools.client.api.TonnagesApi;

public class Example {
  public static void main(String[] args) {
    ApiClient defaultClient = Configuration.getDefaultApiClient();
    defaultClient.setBasePath("http://localhost");

    TonnagesApi apiInstance = new TonnagesApi(defaultClient);
    Integer tonnage = 50; // Integer | 
    try {
      apiInstance.apiV1TonnagesDelete(tonnage);
    } catch (ApiException e) {
      System.err.println("Exception when calling TonnagesApi#apiV1TonnagesDelete");
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
 **tonnage** | **Integer**|  |

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

<a name="apiV1TonnagesGet"></a>
# **apiV1TonnagesGet**
> apiV1TonnagesGet()

Получить список тоннажей

### Example
```java
// Import classes:
import org.openapitools.client.ApiClient;
import org.openapitools.client.ApiException;
import org.openapitools.client.Configuration;
import org.openapitools.client.models.*;
import org.openapitools.client.api.TonnagesApi;

public class Example {
  public static void main(String[] args) {
    ApiClient defaultClient = Configuration.getDefaultApiClient();
    defaultClient.setBasePath("http://localhost");

    TonnagesApi apiInstance = new TonnagesApi(defaultClient);
    try {
      apiInstance.apiV1TonnagesGet();
    } catch (ApiException e) {
      System.err.println("Exception when calling TonnagesApi#apiV1TonnagesGet");
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

<a name="apiV1TonnagesPost"></a>
# **apiV1TonnagesPost**
> apiV1TonnagesPost(UNKNOWN_BASE_TYPE)

Добавить тоннаж

### Example
```java
// Import classes:
import org.openapitools.client.ApiClient;
import org.openapitools.client.ApiException;
import org.openapitools.client.Configuration;
import org.openapitools.client.models.*;
import org.openapitools.client.api.TonnagesApi;

public class Example {
  public static void main(String[] args) {
    ApiClient defaultClient = Configuration.getDefaultApiClient();
    defaultClient.setBasePath("http://localhost");

    TonnagesApi apiInstance = new TonnagesApi(defaultClient);
    UNKNOWN_BASE_TYPE UNKNOWN_BASE_TYPE = new UNKNOWN_BASE_TYPE(); // UNKNOWN_BASE_TYPE | Данные тоннажа для добавления
    try {
      apiInstance.apiV1TonnagesPost(UNKNOWN_BASE_TYPE);
    } catch (ApiException e) {
      System.err.println("Exception when calling TonnagesApi#apiV1TonnagesPost");
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
 **UNKNOWN_BASE_TYPE** | [**UNKNOWN_BASE_TYPE**](UNKNOWN_BASE_TYPE.md)| Данные тоннажа для добавления |

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

