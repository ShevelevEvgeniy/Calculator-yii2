# CalculateApi

All URIs are relative to *http://localhost*

Method | HTTP request | Description
------------- | ------------- | -------------
[**apiV1CalculateGet**](CalculateApi.md#apiV1CalculateGet) | **GET** /api/v1/calculate | Рассчитать цену


<a name="apiV1CalculateGet"></a>
# **apiV1CalculateGet**
> apiV1CalculateGet(month, type, tonnage)

Рассчитать цену

### Example
```java
// Import classes:
import org.openapitools.client.ApiClient;
import org.openapitools.client.ApiException;
import org.openapitools.client.Configuration;
import org.openapitools.client.models.*;
import org.openapitools.client.api.CalculateApi;

public class Example {
  public static void main(String[] args) {
    ApiClient defaultClient = Configuration.getDefaultApiClient();
    defaultClient.setBasePath("http://localhost");

    CalculateApi apiInstance = new CalculateApi(defaultClient);
    String month = "январь"; // String | 
    String type = "шрот"; // String | 
    Integer tonnage = 50; // Integer | 
    try {
      apiInstance.apiV1CalculateGet(month, type, tonnage);
    } catch (ApiException e) {
      System.err.println("Exception when calling CalculateApi#apiV1CalculateGet");
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
 **type** | **String**|  |
 **tonnage** | **Integer**|  |

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

