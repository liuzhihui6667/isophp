import '@babel/polyfill';
import dva from 'dva';
import createHistory from 'history/createHashHistory';
import createLoading from 'dva-loading';
import 'moment/locale/zh-cn';
import FastClick from 'fastclick';
import './rollbar';
import onError from './error';
import './index.less';
// 1. Initialize
const app = dva({
  history: createHistory(),
  onError,
});
window.app = app;
// 2. Plugins
app.use(createLoading());

// 3. Register global model
app.model(require('./Apps/Sys/Handlers/Global').default);
app.model(require('./Apps/User/Handlers/Login').default);

// 4. Router
app.router(require('./router').default);
// 5. Start
app.start('#root');
FastClick.attach(document.body);
