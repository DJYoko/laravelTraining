require('dotenv').config();
const webdriver = require('selenium-webdriver');
const { Builder, By } = require('selenium-webdriver');
const assert = require('assert');

let driver;

describe('Login Correct Test', () => {
  before(() => {
    driver = new Builder().forBrowser('chrome').build();
    process.on('unhandledRejection', console.dir);
  });

  after(() => {
    return driver.quit();
  });

  it('submit with correct ID/Password', async () => {
    // goto Login page
    const loginPageUrl = process.env.APP_URL + '/auth/login';
    await driver.get(loginPageUrl);

    // input params
    driver
      .findElement(By.name('email'))
      .sendKeys(process.env.WEB_LOGIN_TEST_ACCOUNT_EMAIL);
    driver
      .findElement(By.name('password'))
      .sendKeys(process.env.WEB_LOGIN_TEST_ACCOUNT_PASSWORD);

    // submit
    await driver.findElement(By.className('btn')).click();
    await driver.wait(webdriver.until.elementLocated(By.tagName('h1')), 10000);

    // evaluate result
    const alertText = await driver.findElement(By.tagName('h1')).getText();
    const correctH1Text = 'Home';
    assert.equal(correctH1Text, alertText);
  });
});
