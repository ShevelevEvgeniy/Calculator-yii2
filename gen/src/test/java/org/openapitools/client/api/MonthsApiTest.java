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

import org.openapitools.client.ApiException;
import org.openapitools.client.model.UNKNOWN_BASE_TYPE;
import org.junit.Test;
import org.junit.Ignore;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

/**
 * API tests for MonthsApi
 */
@Ignore
public class MonthsApiTest {

    private final MonthsApi api = new MonthsApi();

    
    /**
     * Удалить месяц по имени
     *
     * 
     *
     * @throws ApiException
     *          if the Api call fails
     */
    @Test
    public void apiV1MonthsDeleteTest() throws ApiException {
        String month = null;
        api.apiV1MonthsDelete(month);

        // TODO: test validations
    }
    
    /**
     * Получить список месяцев
     *
     * 
     *
     * @throws ApiException
     *          if the Api call fails
     */
    @Test
    public void apiV1MonthsGetTest() throws ApiException {
        api.apiV1MonthsGet();

        // TODO: test validations
    }
    
    /**
     * Добавить месяц
     *
     * 
     *
     * @throws ApiException
     *          if the Api call fails
     */
    @Test
    public void apiV1MonthsPostTest() throws ApiException {
        UNKNOWN_BASE_TYPE UNKNOWN_BASE_TYPE = null;
        api.apiV1MonthsPost(UNKNOWN_BASE_TYPE);

        // TODO: test validations
    }
    
}
