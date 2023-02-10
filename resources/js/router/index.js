import { createRouter, createWebHistory } from 'vue-router'


const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
  routes: [

    {
      path: '/',
      name: 'main',
      component: () => import('../views/main/Index.vue')
    },

    {
        path: '/contacts',
        name: 'contacts',
        component: () => import('../views/contacts/Index.vue')
      },
  ]
})

export default router
