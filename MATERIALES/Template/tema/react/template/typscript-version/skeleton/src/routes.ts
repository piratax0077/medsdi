import * as React from 'react';
import { RouteObject } from './route'

const OtherSamplePage = React.lazy(() => import('./Demo/Other/SamplePage'));
const routes: RouteObject[] = [
    { path: '/sample-page', exact: true, name: 'Sample Page', component: OtherSamplePage }
];
export default routes;
