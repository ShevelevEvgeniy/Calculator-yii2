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


package org.openapitools.client;

@javax.annotation.Generated(value = "org.openapitools.codegen.languages.JavaClientCodegen", date = "2023-11-09T04:28:12.222864900+03:00[Europe/Moscow]")
public class Pair {
    private String name = "";
    private String value = "";

    public Pair (String name, String value) {
        setName(name);
        setValue(value);
    }

    private void setName(String name) {
        if (!isValidString(name)) {
            return;
        }

        this.name = name;
    }

    private void setValue(String value) {
        if (!isValidString(value)) {
            return;
        }

        this.value = value;
    }

    public String getName() {
        return this.name;
    }

    public String getValue() {
        return this.value;
    }

    private boolean isValidString(String arg) {
        if (arg == null) {
            return false;
        }

        if (arg.trim().isEmpty()) {
            return false;
        }

        return true;
    }
}
