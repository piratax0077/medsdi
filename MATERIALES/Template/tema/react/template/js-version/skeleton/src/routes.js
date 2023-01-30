import * as React from 'react';
const OtherSamplePage = React.lazy(() => import('./Demo/Other/SamplePage'));
const routes = [
    { path: '/sample-page', exact: true, name: 'Sample Page', component: OtherSamplePage }
];
export default routes;
