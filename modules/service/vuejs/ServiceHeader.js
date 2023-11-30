import ServiceDetail from './ServiceDetail.js'

export default {
    components: {
        ServiceDetail
    },
    props: {
      title: String
    },
    data:() => ({
        myDetail: 'Lorem .....'
    }),
    template: `
            <div>
                <h1>Header - {{title}} aa</h1>
                <service-detail :detail="myDetail"></service-detail>
            </div>
    `
  }
  