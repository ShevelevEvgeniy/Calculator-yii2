/*
 * API Калькулятор расчета стоимости доставки
 * *Калькулятор расчета стоимости доставки* - сервис расчета стоимости доставки ### возможности сервиса   - расчет стоимости доставки   - реестр месяцев доставки   - реестр тоннажей доставки   - реестр типов сырья доставки   - реестр стоимости доставки  Разработчик [{Евгений Шевелев}] ({https://gitlab-dev.efko.ru/}) 
 *
 * The version of the OpenAPI document: 1.0.0
 * 
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


package org.openapitools.client.api;

import org.openapitools.client.ApiCallback;
import org.openapitools.client.ApiClient;
import org.openapitools.client.ApiException;
import org.openapitools.client.ApiResponse;
import org.openapitools.client.Configuration;
import org.openapitools.client.Pair;
import org.openapitools.client.ProgressRequestBody;
import org.openapitools.client.ProgressResponseBody;

import com.google.gson.reflect.TypeToken;

import java.io.IOException;


import org.openapitools.client.model.UNKNOWN_BASE_TYPE;

import java.lang.reflect.Type;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class MonthsApi {
    private ApiClient localVarApiClient;

    public MonthsApi() {
        this(Configuration.getDefaultApiClient());
    }

    public MonthsApi(ApiClient apiClient) {
        this.localVarApiClient = apiClient;
    }

    public ApiClient getApiClient() {
        return localVarApiClient;
    }

    public void setApiClient(ApiClient apiClient) {
        this.localVarApiClient = apiClient;
    }

    /**
     * Build call for apiV1MonthsDelete
     * @param month  (required)
     * @param _callback Callback for upload/download progress
     * @return Call to execute
     * @throws ApiException If fail to serialize the request body object
     * @http.response.details
     <table summary="Response Details" border="1">
        <tr><td> Status Code </td><td> Description </td><td> Response Headers </td></tr>
        <tr><td> 200 </td><td> успешное удаление </td><td>  -  </td></tr>
        <tr><td> 401 </td><td> не авторизован </td><td>  -  </td></tr>
     </table>
     */
    public okhttp3.Call apiV1MonthsDeleteCall(String month, final ApiCallback _callback) throws ApiException {
        Object localVarPostBody = null;

        // create path and map variables
        String localVarPath = "/api/v1/months";

        List<Pair> localVarQueryParams = new ArrayList<Pair>();
        List<Pair> localVarCollectionQueryParams = new ArrayList<Pair>();
        Map<String, String> localVarHeaderParams = new HashMap<String, String>();
        Map<String, String> localVarCookieParams = new HashMap<String, String>();
        Map<String, Object> localVarFormParams = new HashMap<String, Object>();

        if (month != null) {
            localVarQueryParams.addAll(localVarApiClient.parameterToPair("month", month));
        }

        final String[] localVarAccepts = {
            
        };
        final String localVarAccept = localVarApiClient.selectHeaderAccept(localVarAccepts);
        if (localVarAccept != null) {
            localVarHeaderParams.put("Accept", localVarAccept);
        }

        final String[] localVarContentTypes = {
            
        };
        final String localVarContentType = localVarApiClient.selectHeaderContentType(localVarContentTypes);
        localVarHeaderParams.put("Content-Type", localVarContentType);

        String[] localVarAuthNames = new String[] {  };
        return localVarApiClient.buildCall(localVarPath, "DELETE", localVarQueryParams, localVarCollectionQueryParams, localVarPostBody, localVarHeaderParams, localVarCookieParams, localVarFormParams, localVarAuthNames, _callback);
    }

    @SuppressWarnings("rawtypes")
    private okhttp3.Call apiV1MonthsDeleteValidateBeforeCall(String month, final ApiCallback _callback) throws ApiException {
        
        // verify the required parameter 'month' is set
        if (month == null) {
            throw new ApiException("Missing the required parameter 'month' when calling apiV1MonthsDelete(Async)");
        }
        

        okhttp3.Call localVarCall = apiV1MonthsDeleteCall(month, _callback);
        return localVarCall;

    }

    /**
     * Удалить месяц по имени
     * 
     * @param month  (required)
     * @throws ApiException If fail to call the API, e.g. server error or cannot deserialize the response body
     * @http.response.details
     <table summary="Response Details" border="1">
        <tr><td> Status Code </td><td> Description </td><td> Response Headers </td></tr>
        <tr><td> 200 </td><td> успешное удаление </td><td>  -  </td></tr>
        <tr><td> 401 </td><td> не авторизован </td><td>  -  </td></tr>
     </table>
     */
    public void apiV1MonthsDelete(String month) throws ApiException {
        apiV1MonthsDeleteWithHttpInfo(month);
    }

    /**
     * Удалить месяц по имени
     * 
     * @param month  (required)
     * @return ApiResponse&lt;Void&gt;
     * @throws ApiException If fail to call the API, e.g. server error or cannot deserialize the response body
     * @http.response.details
     <table summary="Response Details" border="1">
        <tr><td> Status Code </td><td> Description </td><td> Response Headers </td></tr>
        <tr><td> 200 </td><td> успешное удаление </td><td>  -  </td></tr>
        <tr><td> 401 </td><td> не авторизован </td><td>  -  </td></tr>
     </table>
     */
    public ApiResponse<Void> apiV1MonthsDeleteWithHttpInfo(String month) throws ApiException {
        okhttp3.Call localVarCall = apiV1MonthsDeleteValidateBeforeCall(month, null);
        return localVarApiClient.execute(localVarCall);
    }

    /**
     * Удалить месяц по имени (asynchronously)
     * 
     * @param month  (required)
     * @param _callback The callback to be executed when the API call finishes
     * @return The request call
     * @throws ApiException If fail to process the API call, e.g. serializing the request body object
     * @http.response.details
     <table summary="Response Details" border="1">
        <tr><td> Status Code </td><td> Description </td><td> Response Headers </td></tr>
        <tr><td> 200 </td><td> успешное удаление </td><td>  -  </td></tr>
        <tr><td> 401 </td><td> не авторизован </td><td>  -  </td></tr>
     </table>
     */
    public okhttp3.Call apiV1MonthsDeleteAsync(String month, final ApiCallback<Void> _callback) throws ApiException {

        okhttp3.Call localVarCall = apiV1MonthsDeleteValidateBeforeCall(month, _callback);
        localVarApiClient.executeAsync(localVarCall, _callback);
        return localVarCall;
    }
    /**
     * Build call for apiV1MonthsGet
     * @param _callback Callback for upload/download progress
     * @return Call to execute
     * @throws ApiException If fail to serialize the request body object
     * @http.response.details
     <table summary="Response Details" border="1">
        <tr><td> Status Code </td><td> Description </td><td> Response Headers </td></tr>
        <tr><td> 200 </td><td> Успешный ответ </td><td>  -  </td></tr>
        <tr><td> 401 </td><td> не авторизован </td><td>  -  </td></tr>
     </table>
     */
    public okhttp3.Call apiV1MonthsGetCall(final ApiCallback _callback) throws ApiException {
        Object localVarPostBody = null;

        // create path and map variables
        String localVarPath = "/api/v1/months";

        List<Pair> localVarQueryParams = new ArrayList<Pair>();
        List<Pair> localVarCollectionQueryParams = new ArrayList<Pair>();
        Map<String, String> localVarHeaderParams = new HashMap<String, String>();
        Map<String, String> localVarCookieParams = new HashMap<String, String>();
        Map<String, Object> localVarFormParams = new HashMap<String, Object>();

        final String[] localVarAccepts = {
            "application/json"
        };
        final String localVarAccept = localVarApiClient.selectHeaderAccept(localVarAccepts);
        if (localVarAccept != null) {
            localVarHeaderParams.put("Accept", localVarAccept);
        }

        final String[] localVarContentTypes = {
            
        };
        final String localVarContentType = localVarApiClient.selectHeaderContentType(localVarContentTypes);
        localVarHeaderParams.put("Content-Type", localVarContentType);

        String[] localVarAuthNames = new String[] {  };
        return localVarApiClient.buildCall(localVarPath, "GET", localVarQueryParams, localVarCollectionQueryParams, localVarPostBody, localVarHeaderParams, localVarCookieParams, localVarFormParams, localVarAuthNames, _callback);
    }

    @SuppressWarnings("rawtypes")
    private okhttp3.Call apiV1MonthsGetValidateBeforeCall(final ApiCallback _callback) throws ApiException {
        

        okhttp3.Call localVarCall = apiV1MonthsGetCall(_callback);
        return localVarCall;

    }

    /**
     * Получить список месяцев
     * 
     * @throws ApiException If fail to call the API, e.g. server error or cannot deserialize the response body
     * @http.response.details
     <table summary="Response Details" border="1">
        <tr><td> Status Code </td><td> Description </td><td> Response Headers </td></tr>
        <tr><td> 200 </td><td> Успешный ответ </td><td>  -  </td></tr>
        <tr><td> 401 </td><td> не авторизован </td><td>  -  </td></tr>
     </table>
     */
    public void apiV1MonthsGet() throws ApiException {
        apiV1MonthsGetWithHttpInfo();
    }

    /**
     * Получить список месяцев
     * 
     * @return ApiResponse&lt;Void&gt;
     * @throws ApiException If fail to call the API, e.g. server error or cannot deserialize the response body
     * @http.response.details
     <table summary="Response Details" border="1">
        <tr><td> Status Code </td><td> Description </td><td> Response Headers </td></tr>
        <tr><td> 200 </td><td> Успешный ответ </td><td>  -  </td></tr>
        <tr><td> 401 </td><td> не авторизован </td><td>  -  </td></tr>
     </table>
     */
    public ApiResponse<Void> apiV1MonthsGetWithHttpInfo() throws ApiException {
        okhttp3.Call localVarCall = apiV1MonthsGetValidateBeforeCall(null);
        return localVarApiClient.execute(localVarCall);
    }

    /**
     * Получить список месяцев (asynchronously)
     * 
     * @param _callback The callback to be executed when the API call finishes
     * @return The request call
     * @throws ApiException If fail to process the API call, e.g. serializing the request body object
     * @http.response.details
     <table summary="Response Details" border="1">
        <tr><td> Status Code </td><td> Description </td><td> Response Headers </td></tr>
        <tr><td> 200 </td><td> Успешный ответ </td><td>  -  </td></tr>
        <tr><td> 401 </td><td> не авторизован </td><td>  -  </td></tr>
     </table>
     */
    public okhttp3.Call apiV1MonthsGetAsync(final ApiCallback<Void> _callback) throws ApiException {

        okhttp3.Call localVarCall = apiV1MonthsGetValidateBeforeCall(_callback);
        localVarApiClient.executeAsync(localVarCall, _callback);
        return localVarCall;
    }
    /**
     * Build call for apiV1MonthsPost
     * @param UNKNOWN_BASE_TYPE Данные месяца для добавления (required)
     * @param _callback Callback for upload/download progress
     * @return Call to execute
     * @throws ApiException If fail to serialize the request body object
     * @http.response.details
     <table summary="Response Details" border="1">
        <tr><td> Status Code </td><td> Description </td><td> Response Headers </td></tr>
        <tr><td> 200 </td><td> успешное добавление </td><td>  -  </td></tr>
        <tr><td> 401 </td><td> не авторизован </td><td>  -  </td></tr>
     </table>
     */
    public okhttp3.Call apiV1MonthsPostCall(UNKNOWN_BASE_TYPE UNKNOWN_BASE_TYPE, final ApiCallback _callback) throws ApiException {
        Object localVarPostBody = UNKNOWN_BASE_TYPE;

        // create path and map variables
        String localVarPath = "/api/v1/months";

        List<Pair> localVarQueryParams = new ArrayList<Pair>();
        List<Pair> localVarCollectionQueryParams = new ArrayList<Pair>();
        Map<String, String> localVarHeaderParams = new HashMap<String, String>();
        Map<String, String> localVarCookieParams = new HashMap<String, String>();
        Map<String, Object> localVarFormParams = new HashMap<String, Object>();

        final String[] localVarAccepts = {
            
        };
        final String localVarAccept = localVarApiClient.selectHeaderAccept(localVarAccepts);
        if (localVarAccept != null) {
            localVarHeaderParams.put("Accept", localVarAccept);
        }

        final String[] localVarContentTypes = {
            "application/json"
        };
        final String localVarContentType = localVarApiClient.selectHeaderContentType(localVarContentTypes);
        localVarHeaderParams.put("Content-Type", localVarContentType);

        String[] localVarAuthNames = new String[] {  };
        return localVarApiClient.buildCall(localVarPath, "POST", localVarQueryParams, localVarCollectionQueryParams, localVarPostBody, localVarHeaderParams, localVarCookieParams, localVarFormParams, localVarAuthNames, _callback);
    }

    @SuppressWarnings("rawtypes")
    private okhttp3.Call apiV1MonthsPostValidateBeforeCall(UNKNOWN_BASE_TYPE UNKNOWN_BASE_TYPE, final ApiCallback _callback) throws ApiException {
        
        // verify the required parameter 'UNKNOWN_BASE_TYPE' is set
        if (UNKNOWN_BASE_TYPE == null) {
            throw new ApiException("Missing the required parameter 'UNKNOWN_BASE_TYPE' when calling apiV1MonthsPost(Async)");
        }
        

        okhttp3.Call localVarCall = apiV1MonthsPostCall(UNKNOWN_BASE_TYPE, _callback);
        return localVarCall;

    }

    /**
     * Добавить месяц
     * 
     * @param UNKNOWN_BASE_TYPE Данные месяца для добавления (required)
     * @throws ApiException If fail to call the API, e.g. server error or cannot deserialize the response body
     * @http.response.details
     <table summary="Response Details" border="1">
        <tr><td> Status Code </td><td> Description </td><td> Response Headers </td></tr>
        <tr><td> 200 </td><td> успешное добавление </td><td>  -  </td></tr>
        <tr><td> 401 </td><td> не авторизован </td><td>  -  </td></tr>
     </table>
     */
    public void apiV1MonthsPost(UNKNOWN_BASE_TYPE UNKNOWN_BASE_TYPE) throws ApiException {
        apiV1MonthsPostWithHttpInfo(UNKNOWN_BASE_TYPE);
    }

    /**
     * Добавить месяц
     * 
     * @param UNKNOWN_BASE_TYPE Данные месяца для добавления (required)
     * @return ApiResponse&lt;Void&gt;
     * @throws ApiException If fail to call the API, e.g. server error or cannot deserialize the response body
     * @http.response.details
     <table summary="Response Details" border="1">
        <tr><td> Status Code </td><td> Description </td><td> Response Headers </td></tr>
        <tr><td> 200 </td><td> успешное добавление </td><td>  -  </td></tr>
        <tr><td> 401 </td><td> не авторизован </td><td>  -  </td></tr>
     </table>
     */
    public ApiResponse<Void> apiV1MonthsPostWithHttpInfo(UNKNOWN_BASE_TYPE UNKNOWN_BASE_TYPE) throws ApiException {
        okhttp3.Call localVarCall = apiV1MonthsPostValidateBeforeCall(UNKNOWN_BASE_TYPE, null);
        return localVarApiClient.execute(localVarCall);
    }

    /**
     * Добавить месяц (asynchronously)
     * 
     * @param UNKNOWN_BASE_TYPE Данные месяца для добавления (required)
     * @param _callback The callback to be executed when the API call finishes
     * @return The request call
     * @throws ApiException If fail to process the API call, e.g. serializing the request body object
     * @http.response.details
     <table summary="Response Details" border="1">
        <tr><td> Status Code </td><td> Description </td><td> Response Headers </td></tr>
        <tr><td> 200 </td><td> успешное добавление </td><td>  -  </td></tr>
        <tr><td> 401 </td><td> не авторизован </td><td>  -  </td></tr>
     </table>
     */
    public okhttp3.Call apiV1MonthsPostAsync(UNKNOWN_BASE_TYPE UNKNOWN_BASE_TYPE, final ApiCallback<Void> _callback) throws ApiException {

        okhttp3.Call localVarCall = apiV1MonthsPostValidateBeforeCall(UNKNOWN_BASE_TYPE, _callback);
        localVarApiClient.executeAsync(localVarCall, _callback);
        return localVarCall;
    }
}
